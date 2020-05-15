<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    
    protected $table = "product";

    public function product_type()
    {
        return $this->belongsTo('App\ProductDetail','idType','id');
    }

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail','idProduct','id');
    }
}

