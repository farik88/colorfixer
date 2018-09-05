<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['number', 'end_date'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public static function findForCustomerByNumber($number, $customerData)
    {
        $query = self::with('attachments')
            ->select('stages.*')
            ->where('stages.number', $number)
            ->join('cars', function ($carsJoin) use ($customerData) {
                $carsJoin->on('stages.car_id', 'cars.id')
                    ->where('cars.id', $customerData->car_id)
                    ->whereNull('cars.deleted_at');
            });

        return $query->first();
    }

    public static function findForCustomer($customerData)
    {
        $query = self::with('attachments')
            ->select('stages.*')
            ->join('cars', function ($carsJoin) use ($customerData) {
                $carsJoin->on('stages.car_id', 'cars.id')
                    ->where('cars.id', $customerData->car_id)
                    ->whereNull('cars.deleted_at');
            });

        return $query->get();
    }
}
