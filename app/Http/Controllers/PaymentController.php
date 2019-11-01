<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Paystack;
use App\Models\Order;

class PaymentController extends Controller
{
    private $paystack;
    public function __construct()
    {
        $this->paystack = new Paystack();
    }
    public function makePayment()
    {
        return $this->paystack->getAuthorizationUrl()->redirectNow();
    }

    public function handlePaymentCallback()
    {
        $paymentDetails = $this->paystack->getPaymentData();
        if($paymentDetails["status"])
        {
           $order= Order::where("id",$paymentDetails["data"]['metadata'])->first();
            if($order != null)
            {
                $order->status =1;
                $order->save();
                return redirect(route("my-orders"))->withMessage($paymentDetails["message"]);
            }
        }
      
    
        return redirect(route("my-orders"))->withError($paymentDetails["message"]);
    }
}
