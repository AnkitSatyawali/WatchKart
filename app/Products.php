<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    public $timestamps = false;
    protected $dates = ['launchDate'];
    public function tags(){
        return $this->belongsToMany(Tags::class);
    }
}
