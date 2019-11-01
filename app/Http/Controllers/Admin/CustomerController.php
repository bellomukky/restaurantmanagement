<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('customers.index',compact('users'));
    }

    public function customerOrders($userId)
    {
        $orders = Order::where('customer_id',$userId)->get();
        return view('orders.index',compact('orders'));
    }
}
