<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable=[ 'quantity','food_id','order_id'];

    public function food()
    {
        return $this->belongsTo('App\Models\FoodItem',"food_id");
    }
}
