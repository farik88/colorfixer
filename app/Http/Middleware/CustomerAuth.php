<?php

namespace App\Http\Middleware;

use Closure;
use App\Customer;
use Illuminate\Cookie\CookieJar;

class CustomerAuth
{
    protected $cookieJar;

    public function __construct(CookieJar $cookieJar)
    {
        $this->cookieJar = $cookieJar;
    }

    public function handle($request, Closure $next)
    {
        $value = getCurrentCustomer();

        if (!is_null($value)) {
            $customer = Customer::verifyPhoneAndCarNumber(
                $value->phone,
                $value->number
            );

            if (is_null($customer)) {
                $this->cookieJar->queue(cookie()->forget('customer_data'));
                return redirect(route('home'));
            }
        }

        return $next($request);
    }
}
