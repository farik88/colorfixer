<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['phone'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public static function verifyPhoneAndCarNumber($phone, $number)
    {
        $query = self::join('cars', 'customers.id', 'cars.customer_id')
             ->where('customers.phone', $phone)
             ->where('cars.number', $number)
             ->whereNull('cars.deleted_at')
             ->select([
                 'customers.id as customer_id',
                 'customers.phone',
                 'cars.id as car_id',
                 'cars.number'
             ]);

        return $query->first();
    }
}
