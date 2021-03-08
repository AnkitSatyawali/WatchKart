<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id', 'subtotal', 'total','paymentType','customer_address_id'
    ];
}
