<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\FoodItem;
use TomLingham\Searchy\Facades\Searchy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menus = Menu::all();
        $foods = FoodItem::all()->take(12);
        return view('index',compact('menus','foods'));
    }

    public function search(Request $request)
    {
       
      $keyword ="";
        if(isset($request->all()['query'])){

            $keyword =  $request->all()['query'];
              $foods = Searchy::food_items(['name','tags'])->query($keyword)
         ->getQuery()->having('relevance', '>', 0)->get()->paginate(20);
       
        }else{
              $foods = FoodItem::orderBy('id','desc')->paginate(20);
        }
      
        $menus = Menu::all();
        session()->put('keyword',$keyword);
         session()->put('search',$keyword);
       return view('search',compact('foods','menus'));
    }

    public function menu(Menu $menu)
    {
        $foods = FoodItem::where('menu_id',$menu->id)->paginate(20);
       
        $menus = Menu::all();
        session()->put('search',$menu->name);
       return view('search',compact('foods','menus'));
    }

     
}
