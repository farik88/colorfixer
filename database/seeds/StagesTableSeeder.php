<?php

use Illuminate\Database\Seeder;
use App\Car;
use App\Stage;

class StagesTableSeeder extends Seeder
{
    public function run()
    {
        Car::get()->each(function ($car) {
            $stages = factory(Stage::class, 9)->make();

            $stages->each(function ($stage) use ($car) {
                $stage->car()->associate($car);
                $stage->save();
            });
        });
    }
}
