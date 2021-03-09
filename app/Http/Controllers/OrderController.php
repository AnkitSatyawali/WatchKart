<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use \App\user_address;
use \App\Order;
use \App\Cart;
use App\Order_product;

class OrderController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $orders = Order::where('user_id',Auth::user()->id)->latest()->paginate(7);
        // dd($orders);
        return view('pages.orders',compact('orders'));
    }

    public function show($id){
        $order = Order::find($id);
        $products = Order_product::where('order_id',$id)->get();
        // dd($products);
        return view('pages.order',compact('order','products'));
    }

    public function checkAddress()
    {
        $result = user_address::where('user_id',Auth::user()->id)->first();
        $products = Cart::where('user_id',Auth::user()->id)->get();
        // dd($result);
        if($result && count($products)>0)
        {
            return view('pages.payment',compact('result'));
        }
        else if(count($products)==0)
        {
            return redirect('/userCart');
        }
        else
        {
            return redirect('/saveAddress');
        }
    }

    public function store(Request $req){
        // dd($req->input());
        $orderid = $this->bookOrder($req->input('option'));
        $this->saveProductDetails($orderid);
        session()->flash('message','Order booked successfully');
        return redirect('orderslist');
        // $orders = Order::where('user_id',Auth::user()->id)->latest()->paginate(7);
        // dd($orders);
        // return view('pages.orders',compact('orders'));
        // $this->emptyCart();
    }

    public function bookOrder($option){
        $products = Cart::where('user_id',Auth::user()->id)->get();
        // dd($products);
        $totalcost = 0;
        $gst = 0;
        $grandTotal = 0;
        foreach($products as $product)
        {
            $totalCost = $product['quantity'] * $product['cost'];
            $product['cost'] = $totalCost;
            $grandTotal = $grandTotal + $totalCost;
        }
        $gst = $grandTotal*0.18;
        $totalCost = $grandTotal;
        $grandTotal = $grandTotal+$gst;
        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'paymentType'=>$option,
            'customer_address_id'=>1,
            'subtotal'=>$totalCost,
            'total'=>$grandTotal
        ]);
        return ($order->id);
    }


    public function saveProductDetails($orderid){
        $products = Cart::where('user_id',Auth::user()->id)->get();
        // dd($products);
        foreach($products as $product)
        {
            $totalCost = $product['quantity'] * $product['cost'];

            Order_product::create([
                'order_id'=>$orderid,
                'products_id'=>$product['id'],
                'products_name'=>$product['name'],
                'products_quantity'=>$product['quantity'],
                'products_cost'=>$totalCost
            ]);
            $product->delete();
        }
    }

    public function cancelOrder($id){
        $order = Order::find($id);
        // dd($order);
        $order->status = 'cancelled';
        $order->save();
        // dd($products);
        session()->flash('message',"Order Cancelled Successfully");
        return redirect()->back();
    }

}
