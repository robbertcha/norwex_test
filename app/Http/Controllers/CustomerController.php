<?php

namespace App\Http\Controllers;

use Auth;
use App\Orders;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
            $c = new Customer;
            $list = $c->getList();
            // print_r($list);
            return view('customer', compact('list'));
      
    }
}
