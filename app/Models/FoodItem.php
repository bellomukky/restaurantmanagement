<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{

    protected $fillable = ['name','menu_id','tags','slug','price','discount'];
    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

     public function offer()
    {
        return $this->belongsTo('App\Models\SpecialOffer','food_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
