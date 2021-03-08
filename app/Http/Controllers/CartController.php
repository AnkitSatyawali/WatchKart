<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Cart;
use Carbon\Carbon;
use App\Products;
use Auth;
use Response;

class CartController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $products = Cart::where('user_id',Auth::user()->id)->get();
        // dd($products);
        $totalcost = 0;
        $gst = 0;
        $grandTotal = 0;
        foreach($products as $product){
            $totalCost = $product['quantity'] * $product['cost'];
            $product['cost'] = $totalCost;
            $grandTotal = $grandTotal + $totalCost;
        }
        $gst = $grandTotal*0.18;
        $grandTotal = $grandTotal+$gst;
        return view('pages.cart',compact('products','gst','grandTotal'));
    }

    public function store(Request $req){
        // dd($req->input());
        $result =  Cart::where('user_id',$req->input('user_id'))->where('product_id',$req->input('product_id'))->first();
        $prod = Products::find($req->input('product_id'));
        if(($result) && $prod->quantity>0)
        {
            $result['quantity']=$result['quantity']+1;
            $result->save();
            $prod['quantity'] = $prod['quantity']-1;
        }
        else{
            if($prod->quantity>0){
            Cart::create([
                'name'=>$req->input('name'),
                'cost'=>$req->input('cost'),
                'user_id'=>(Auth::user()->id),
                'product_id'=>$req->input('product_id'),
            ]);
            $prod['quantity'] = $prod['quantity']-1;
            }
        }
        
        
        // $prod['updated_at'] = Carbon::now()->toDateTimeString(); 
        $prod->save();
        return Response::json(['success' => true,'data'=>$result], 200);
    }


    public function delete(Request $req){
        $result =  Cart::where('user_id',$req->input('user_id'))->where('product_id',$req->input('product_id'))->first();
        $prod = Products::find($req->input('product_id'));
        if(($result) && $result['quantity']>1)
        {
            $result['quantity']=$result['quantity']-1;
            $result->save();
        }
        else{
            $result->delete();
        }
        $prod['quantity'] = $prod['quantity']-1;
        $prod->save();
        return Response::json(['success' => true,'data'=>$result], 200);
    }
}
