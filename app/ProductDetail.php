<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
    
    protected $table = "product_type";

    public function product()
    {
        return $this->hasMany('App/Product','idType','id');
    }
}
