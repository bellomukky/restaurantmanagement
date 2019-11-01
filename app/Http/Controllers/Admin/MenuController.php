<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = null;
        return view('menu.save',compact('menu'));
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
            'slug'=>'required',
            'image'=>'required|file',
            'tags'=>'required'
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = $request->slug;
        $menu->tags = $request->tags;
        $menu->image = $request->file('image')->store('public/menu_images');
        $menu->save();
        return redirect(route('menus.index'))->withMessage('Your have successfully created a menu');
    }

    public function show($id)
    {
        //
    }

    public function edit(Menu $menu)
    {
        return view('menu.save',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Menu $menu)
    {
          $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'image'=>'nullable|file',
            'tags'=>'required'
        ]);
    
        $menu->name = $request->name;
        $menu->slug = $request->slug;
        $menu->tags = $request->tags;
       if($request->image!=null)
        {
            if(Storage::disk()->has($menu->image)){
                Storage::delete($menu->image);
            }
            $menu->image = $request->file('image')->store('public/menu_images');

        }
        $menu->save();
        return redirect(route('menus.index'))->withMessage('Your have successfully updated a menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
          if(Storage::disk()->has($menu->image)){
                Storage::delete($menu->image);
            }
            $menu->delete();
            return redirect(route('menus.index'))->withMessage("You have deleted a menu with its related food");
    }
}
