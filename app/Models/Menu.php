<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function foods()
    {
        return $this->hasMany('App\Models\FoodItem');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
