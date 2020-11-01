<?php

namespace App\Http\Controllers;

use Auth;
use App\Orders;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
            $orders = new Orders;
            $list = $orders->getList();

            return view('order', compact('list'));
      
    }
}
