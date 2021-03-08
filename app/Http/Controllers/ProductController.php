<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Products;
use \App\Tags;

class ProductController extends Controller
{
    public function index($tag)
    {
        if($tag=="all")
        {
            $products = Products::paginate(10);
            // dd($products);
            return view('pages.products',compact('products'));
        }
        else 
        {
            $fields= explode('&',$tag);
            $products = array();
            if(count($fields)==2)
            {
                $products = Products::where($fields[0],$fields[1])->paginate(10);
            }
            return view('pages.products',compact('products'));
        }
    }

    public function show($tag)
    {
        $products = Tags::find($tag)->products()->paginate(10);
        // dd($products);
        return view('pages.products',compact('products'));
    }

    public function showProduct($id){
        $product = Products::find($id);
        $tf[0] = 'No';
        $tf[1] = 'Yes';
        return view('pages.product',compact('product','tf'));
    }
}
