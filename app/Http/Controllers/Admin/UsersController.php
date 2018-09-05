<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|unique:users,email'
        ]);

        $tmpPassword = str_random(8);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($tmpPassword),
            'tmp_password' => $tmpPassword,
            'email_token' => base64_encode($request->input('email'))
        ]);

        event(new Registered($user));

        session()->flash('success', collect(['users.registered']));

        return back();
    }

    public function verify($token)
    {
        $user = User::where('email_token', $token)
                    ->first();

        if (is_null($user)) {
            abort(404);
        }

        $user->verified = true;
        $user->email_token = null;
        $user->tmp_password = null;

        $user->save();

        return response()->redirectTo(route('login'));
    }

    public function index()
    {
        session()->forget('warnings');

        $users = User::latest()->get();

        if ($users->count() === 0) {
            session()->flash('warnings', collect(['users.not-found']));
        }

        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        session()->forget('warnings');

        return view('admin.users.create');
    }

    public function destroy($id)
    {
        session()->forget('warnings');
        session()->forget('errors');

        if (Auth::id() == $id) {
            session()->flash('errors', collect(['users.self-destroy']));
        } elseif(User::count() < 2) {
            session()->flash('errors', collect(['users.to-few']));
        } else {
            $user = User::findOrFail($id);
            $user->delete();
            session()->flash('success', collect(['users.destroyed']));
        }

        return back();
    }
}