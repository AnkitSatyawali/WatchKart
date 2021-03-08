<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tags;

class HomeController extends Controller
{
    //
    public function index(){

        //id 1 --> Trending
        $trending = Tags ::find(1)->products;
        // dd($trending);
        
        //id 2 --> best Sellers
        $bestSellers = Tags :: find(2)->products;

        //id 3 --> New Launchs
        $newLaunch = Tags::find(3)->products;
        
        return view('pages.home',compact('trending','bestSellers','newLaunch'));
    }
}
