<?php

use Illuminate\Database\Seeder;
use App\Customer;
use App\Car;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        Customer::get()->each(function ($customer) {
            $cars = factory(Car::class, 2)->make();

            $cars->each(function ($car) use ($customer) {
                $car->customer()->associate($customer);
                $car->save();
            });
        });
    }
}
