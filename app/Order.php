<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    
    protected $table = "order";

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail','idOrder','id');
    }

    public function order()
    {
        return $this->belongsTo('App\Customer','idCustomer','id');
    }

}
