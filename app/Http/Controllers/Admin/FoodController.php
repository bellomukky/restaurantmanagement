<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FoodItem;
use App\Models\SpecialOffer;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;



class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = FoodItem::with('offer')->get();
      
        return view('food.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $menus = Menu::all();
        return view('food.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'tags'=>'required',
            'slug'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'menu_id'=>'required',
            'image'=>'required|file',
        ]);
            $food = new FoodItem();
            $food->fill($request->all());
   
        $food->image = $request->file('image')->store('public/food_images');
            $food->save();
            return redirect(route('foods.index'))->withMessage('Food has been saved successfully');
    }

    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodItem $food)
    {
        $menus = Menu::all();
        return view('food.edit',compact('menus','food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodItem $food)
    {
        $request->validate([
            'name'=>'required',
            'tags'=>'required',
            'slug'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'menu_id'=>'required',
            'image'=>'nullable|file',
        ]);

        $food->fill($request->all());
       if($request->image!=null)
        {
            if(Storage::disk()->has($food->image)){
                Storage::delete($food->image);
            }
            $food->image = $request->file('image')->store('public/food_images');

        }
        $food->save();

        return redirect(route('foods.index'))->withMessage('You have successfully updated a food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $food)
    {
         if(Storage::disk()->has($food->image)){
                Storage::delete($food->image);
        }
        $food->delete();

        return redirect(route('foods.index'))->withMessage('You have deleted this food successfully');
    }

    public function createDiscount(Request $request)
    {
        $request->validate([
            'discount'=>'required',
            'food_id'=>'required'
        ]);

       try{

         $food = FoodItem::where('id',$request->food_id)->first();
        if($food != null)
        {
            $offer = SpecialOffer::where('food_id',$food->id)->first();
          
            if($offer != null){
                $offer->discount = $request->discount;
            }else{
                $offer = new SpecialOffer();
                $offer->discount  = $request->discount;
                $offer->food_id = $request->food_id;
            }
               $offer->save();

           

            return response()->json(1);
        }

        return response()->json(0);
       }catch(\Exception $e){
           return response()->json($e->getMessage());
       }

    }

    public function specialOffers(){
        $offers = SpecialOffer::with('food')->get();
        return view('food.offers',compact('offers'));
    }

    public function deleteOffer(Request $request){
        $request->validate([
            'offer_id'=>'required'
        ]);
        $offer = SpecialOffer::where('id',$request->offer_id)->first();
        if($offer){
            $offer->delete();
        }

        return redirect(route('food.offers'))->withMessage('You have successfully removed an offer');
    }
}
