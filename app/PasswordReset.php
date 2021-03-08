<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    //
    const UPDATED_AT = null;
    protected $primaryKey = 'email';


    protected $fillable = [
        'token', 'email', 'created_at',
    ];
}
