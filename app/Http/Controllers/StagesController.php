<?php

namespace App\Http\Controllers;

use App\Stage;

class StagesController extends Controller
{
    public function show($number)
    {
        $customerData = getCurrentCustomer();
        $stage = null;
        $page = ['number' => $number];

        if (!is_null($customerData)) {
            $stage = Stage::findForCustomerByNumber($number, $customerData);
        }

        return view('stages.stage', compact('stage', 'page'));
    }

    public function index()
    {
        $customerData = getCurrentCustomer();
        $stages = null;

        if (!is_null($customerData)) {
            $stages = Stage::findForCustomer($customerData);
        }

        return view('stages.stages', compact('stages'));
    }
}
