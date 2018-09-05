<?php

namespace Tests\Feature;

use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerAuthControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->seed();
    }

    public function testCustomerShouldProvideValidCredentials()
    {
        $response = $this->post(route('customer.sign-in'), []);
        $response->assertStatus(302);

        $this->assertTrue(session()->has('errors'));
    }

    public function testAuthorizeCustomerWithValidCredentials()
    {
        $customer = Customer::with('cars')->first();

        $response = $this->post(route('customer.sign-in'), [
            'phone' => $customer->phone,
            'number' => $customer->cars->first()->number,
        ]);

        $response->assertStatus(302);

        $this->assertFalse(session()->has('errors'));
        $response->assertCookie('customer_data');
    }

    public function testLogoutShouldExist()
    {
        $response = $this->delete(route('customer.sign-out'));

        $response->assertStatus(302);
    }
}
