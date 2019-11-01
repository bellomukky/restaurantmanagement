<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'full_name',"email","phone","location","address","customer_id","status","total"
    ];

    public function details()
    {
        return $this->hasMany('App\Models\Orderdetail',"order_id")->with('food');
    }
}
