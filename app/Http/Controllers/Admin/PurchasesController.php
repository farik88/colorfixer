<?php

namespace App\Http\Controllers\Admin;

use App\Attachment;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;
use App\Stage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PurchasesController extends Controller
{
    public function index(Request $request)
    {
        session()->forget('warnings');

        $query = Car::with('customer')->latest();
        $type = $request->input('type', 'active');

        switch ($type) {
            case 'all':
                $query->withTrashed();
                break;
            case 'archived':
                $query->onlyTrashed();
                break;
        }

        $purchases = $query->get();

        if ($purchases->count() === 0) {
            session()->flash('warnings', collect(['purchase.not-found']));
        }

        return view('admin.purchases.index')->with([
            'type' => $type, 'purchases' => $purchases
        ]);
    }

    public function create()
    {
        session()->forget('warnings');

        return view('admin.purchases.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|numeric',
            'number' => 'required|alpha_num|unique:cars,number'
        ]);

        $phone  = $request->input('phone');
        $number = $request->input('number');

        $customer = Customer::firstOrCreate(['phone' => $phone]);

        $car = new Car(['number' => $number]);
        $car->customer()->associate($customer);
        $car->save();

        for ($i = 1; $i <= 9; $i++) {
            $stage = new Stage(['number' => $i]);
            $stage->car()->associate($car);
            $stage->save();
        }

        session()->flash('success', collect(['purchase.saved']));

        return response()->redirectTo(route('purchases.edit', ['id' => $car->id]));
    }

    public function edit($id)
    {
        session()->forget('warnings');

        $purchase = Car::with('customer', 'stages.attachments')
                        ->withTrashed()
                        ->findOrFail($id);

        return view('admin.purchases.edit', compact('purchase'));
    }

    public function restore($id)
    {
        Car::withTrashed()
            ->findOrFail($id)
            ->restore();

        session()->flash('success', collect(['purchase.restored']));

        return back();
    }

    public function destroy($id)
    {
        Car::withTrashed()
            ->findOrFail($id)
            ->forceDelete();

        $files = File::files(storage_path('app/public'));

        collect($files)->each(function ($file) {
            if (preg_match('/\/(\w+\.\w+)$/', $file, $matches)) {
                if (Attachment::where('name', $matches[1])->count() === 0) {
                    File::delete($file);
                }
            }
        });

        session()->flash('success', collect(['purchase.destroyed']));

        return back();
    }

    public function archive($id)
    {
        Car::findOrFail($id)
            ->delete();

        session()->flash('success', collect(['purchase.archived']));

        return back();
    }

    public function attachmentsStore(Request $request, $purchaseId, $stageNumber)
    {
        $car = Car::withTrashed()
                  ->with('stages')
                  ->findOrFail($purchaseId);

        $this->validate($request, [
            'attachment' => 'required|file|max:67108864|mimes:jpeg,jpg,png,mp4,ogg,webm,mov,qt'
        ]);

        $file = $request->file('attachment');

        $fileName = $this->normalizeFileName($file);

        $attachment = new Attachment();
        $attachment->name = $fileName;

        if (in_array($this->getFileExtension($file), ['jpeg','jpg','png'])) {
            $image = Image::make($file);

            $image->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image->save(storage_path("app/public/{$attachment->name}"), 90);
            $attachment->type = 'photo';
        } else {
            $file->storeAs('public', "{$fileName}");
            $attachment->type = 'video';
        }

        $stage = $car->stages->first(function ($stage) use ($stageNumber) {
            return $stage->number === (int) $stageNumber;
        });

        if (is_null($stage)) {
            $stage = new Stage();
            $stage->number = $stageNumber;
            $stage->car()->associate($car);
            $stage->save();
        }

        $attachment->stage()->associate($stage);
        $attachment->save();

        session()->flash('success', collect(['attachment.saved']));

        return back();
    }

    public function attachmentsDestroy($attachmentId)
    {
        $attachment = Attachment::findOrFail($attachmentId);

        if (File::exists($attachment)) {
            File::delete($attachment);
        }

        $attachment->delete();

        session()->flash('success', collect(['attachment.destroyed']));

        return back();
    }

    public function addEndDate(Request $request, $purchaseId, $stageNumber)
    {
        $car = Car::withTrashed()->findOrFail($purchaseId);
        $stage = $car->stages()->where('number', $stageNumber)->first();
        $stage->end_date = $request->input('end_date', '');
        $stage->save();
        session()->flash('success', collect(['purchase.saved']));
        return back();
    }

    private function normalizeFileName($file)
    {
        return md5($file->getClientOriginalName() . uniqid()) . '.' . $this->getFileExtension($file);
    }

    private function getFileExtension($file)
    {
        return strtolower($file->getClientOriginalExtension());
    }
}
