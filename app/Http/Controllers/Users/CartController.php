<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FoodItem;

class CartController extends Controller
{
    public function cart()
    {
        $cart =session()->has('cart') ? session()->get('cart') : [];
        $total = 0;
        foreach($cart as $item){
            $total += $item['price']*$item['quantity'];
        }

        return view('cart',compact('cart','total'));
    }

    public function addCart(Request $request)
    {
        try{

            $food = FoodItem::findOrfail($request->product_id);
            $cart = session()->has('cart') ? session()->get('cart') : [];
            if(array_key_exists($food->id, $cart)) {
                return response()->json(2);
            } else {
                $cart[$food->id] = [
                    'id'=>$food->id,
                    'image'=>$food->image,
                    'price'=>$food->price,
                    'discount'=>$food->discount,
                    'name' => $food->name,
                    'quantity' => 1,
                ];
            }
            session(['cart' => $cart]);
            return response()->json(1);
        }catch(\Exception $ex)
        {
              return response()->json(0);
        }
        
    }

    public function deleteItem(Request $request)
    {
        
      
        try{

            $food = FoodItem::findOrfail($request->food_id);
            $cart = session()->has('cart') ? session()->get('cart') : [];

            if(array_key_exists($food->id, $cart)) {
       
             unset($cart[$food->id]);
            } 
            session(['cart' => $cart]);
            
            return response()->json(1);
        }catch(\Exception $ex)
        {
              return response()->json(0);
        }
    }
}
