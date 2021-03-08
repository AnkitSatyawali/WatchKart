<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'order_id', 'products_id', 'products_quantity','products_cost','products_name'
    ];
}
