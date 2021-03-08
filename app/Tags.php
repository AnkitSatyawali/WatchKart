<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    public function products(){
        return $this->belongsToMany(Products::class);
    }
}
