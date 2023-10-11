<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()
            ->with('salesRep')
            ->orderBy('name')
            ->paginate();

        return view('customers', ['customers' => $customers]);
    }
}
