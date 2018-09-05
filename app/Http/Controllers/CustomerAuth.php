<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;

class CustomerAuth extends Controller
{
    public function logIn(CookieJar $cookieJar, Request $request)
    {
        $this->deleteFromCookies($cookieJar);

        $this->validate($request, [
            'phone' => 'required|numeric|exists:customers,phone',
            'number' => 'required|alpha_num|exists:cars,number'
        ]);

        $customer = Customer::verifyPhoneAndCarNumber(
            $request->input('phone'),
            $request->input('number')
        );

        if (is_null($customer)) {
            $request->session()->flash('errors', collect(['Incorrect']));
        } else {
            $this->saveInCookies($cookieJar, $customer, 60 * 24 * 30);
        }

        return response()->redirectTo(route('stages.index'));
    }

    public function logOut(CookieJar $cookieJar)
    {
        $this->deleteFromCookies($cookieJar);

        return response()->redirectTo(route('home'));
    }

    protected function saveInCookies($cookieJar, $customer, $ttl)
    {
        $cookie = cookie('customer_data', $customer->toJson(), $ttl);

        $cookieJar->queue($cookie);
    }

    protected function deleteFromCookies($cookieJar)
    {
        $cookie = cookie()->forget('customer_data');

        $cookieJar->queue($cookie);
    }
}
