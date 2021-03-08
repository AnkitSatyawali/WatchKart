<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\user_address;
use Auth;

class UserController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $address = user_address::where('user_id',Auth::user()->id)->first();
        // dd($address);
        return view('pages.profile',compact('address'));
    }

}
