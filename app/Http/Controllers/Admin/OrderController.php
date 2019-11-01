<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status',1)->get();
 
        return view('orders.index',compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::with("details")->where('id',$id)->first();
        if($order == null)
        return abort('404');

        return view('orders.detail',compact('order'));
    }
}
