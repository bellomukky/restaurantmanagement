<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    public function food(){
        return $this->belongsTo('App\Models\FoodItem');
    }
}
