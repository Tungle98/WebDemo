<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    //
    public function getDanhsach()
    {
        $customer = Customer::all();
        return view('admin.customer.danhsach',['customer'=>$customer]);
    }
}
