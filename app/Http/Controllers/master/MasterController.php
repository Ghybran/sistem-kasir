<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    function da_mas()
    {
        $orders=Order::all();
     return view('master.dashboard',compact('orders'));
    }

}
