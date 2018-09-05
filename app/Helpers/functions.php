<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;

function requestedLocale()
{
    $request = request()->segment(1);
    $language = null;

    if (in_array($request, config('app.locales'))) {
        $language = $request;
        App::setLocale($language);
    }

    return $language;
}

function getCurrentCustomer()
{
    $cookie = Cookie::get('customer_data');
    $customer = null;

    if ($cookie) {
        $customer = json_decode($cookie);
        if (is_null($customer)) {
            $customer = json_decode(Crypt::decrypt($cookie));
        }
    }

    return $customer;
}