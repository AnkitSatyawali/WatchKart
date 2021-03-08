<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use \App\Address;

class user_address extends Model
{
    //
    protected $fillable = [
        'country', 'address', 'state','zip','user_id','addressline1','zipcode'
    ];
}
