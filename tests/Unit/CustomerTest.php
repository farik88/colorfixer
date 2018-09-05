<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Customer;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->seed();
    }

    public function testVerifyPhoneAndCarNumberShouldReturnCorrectData()
    {
        $customerExpected = Customer::with('cars')->first();

        $customer = Customer::verifyPhoneAndCarNumber(
            $customerExpected->phone,
            $customerExpected->cars->first()->number
        );

        $this->assertEquals($customerExpected->id, $customer->customer_id);
        $this->assertEquals($customerExpected->phone, $customer->phone);
        $this->assertEquals($customerExpected->cars->first()->id, $customer->car_id);
        $this->assertEquals($customerExpected->cars->first()->number, $customer->number);
    }
}
