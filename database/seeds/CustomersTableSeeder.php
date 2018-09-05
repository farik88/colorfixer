<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        factory(Customer::class, 2)->create();
    }
}
