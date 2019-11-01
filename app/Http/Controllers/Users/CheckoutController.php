<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use Unicodeveloper\Paystack\Paystack;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function order(Request $request)
    {
     
     $cart = session()->has('cart') ?session()->get('cart'):[];
       if(count($cart) <= 0){
         
          return redirect(route("cart"));
      
       }

       
         
        $count = (count($request->all())-1)/2;
        $total = 0;
        $string="";
        for($i=1; $i <= $count; $i++){
            if($request->get("item_id_".$i) != null && $request->get("item_quantity_".$i) > 0)
            {
                 $food = FoodItem::findOrfail($request->get("item_id_".$i));
                  $orders[] = [
                    'id'=>$food->id,
                    'price'=>$food->price *  $request->get("item_quantity_".$i),
                    'name' => $food->name,
                    'quantity' => $request->get("item_quantity_".$i),
                ];
                $total += $request->get("item_quantity_".$i)*$food->price;
            }
        }
        session(['orders' => $orders]);
        session(['total'=>$total]);
        $orders = collect($orders);
       
        return view('order',compact('total','orders'));
    }

    public function saveOrder(Request $request)
    {
      $orders = session()->has('orders') ? session()->get('orders') : [];
      if(!session()->has('orders'))
      {
        return redirect(route("cart"));
      }
      $order = Order::create([
        'full_name'=>$request->full_name,
        "email"=>$request->email,
        "phone"=>$request->phone,
        "location"=>$request->location,
        "address"=>$request->address,
        "customer_id"=>Auth::user()->id,
        "status"=>0,
        "total"=>session()->get('total')
      ]);
      if($order != null)
      {
        foreach($orders as $food)
        {
          Orderdetail::create([
            'quantity'=>$food['quantity'],
            'food_id'=>$food['id'],
            'order_id'=>$order->id
          ]);
        }
        session()->forget('cart');
        session()->forget('orders');
        session()->forget('total');
        $response['status']=1;
        $response['order']=$order;
        return response()->json($response,200); 
      }
        
    }

    public function userOrders()
    {
      $user = Auth::user();
      $orders = Order::where('customer_id',$user->id)->get();
      return view("user.orders",compact("orders"));
    }

    public function editOrder($orderId)
    {
        $user = Auth::user();
        $order = Order::with("details")->where("id",$orderId)
        ->where('customer_id',$user->id)->first();
        return view("user.pay",compact("order"));
    }

    public function updateOrder(Request $request,$orderId)
    {
     
      $order = Order::where("id",$orderId)->where('customer_id',Auth::user()->id)->first();
      if($order != null)
      {
          $order->fill([
            'full_name'=>$request->full_name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "location"=>$request->location,
            "address"=>$request->address,
          ]);
          $order->save();

        $response['status']=1;
        $response['order']=$order;
        return response()->json($response,200);
      }
      $response['status']=0;
        $response['message']="Bad Request";
      return response()->json($response,200);
    }

    public function deleteOrder($orderId)
    {
      $order = Order::where("id",$orderId)->where('customer_id',Auth::user()->id)->first();
      if($order != null)
      {
        $order->delete();
        //Orderdetail::where('order_id',$order)->delete();
        return redirect(route("my-orders"))->withMessage("Order deleted successfully");
      }
      return redirect(route("my-orders"))->withError("Order does not exsit");
    }


}
