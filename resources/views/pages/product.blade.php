@extends('layouts.master')

@section('content')
<html>
    <head>
        <script src="/js/product.js"></script>
    </head>
<body>
<div class="individual_prod_main">
    <div class="productpage_main_image">
    <div class="individual_prod_img_div">
        <div class="individual_prod_sideimg">
            <div class="actual_img">
                <img id="image1" class="actual_img_style image_active" onclick="changeImg(this.id)" src="{{$product['image1']}}">
            </div>
            <div class="actual_img">
                <img id="image2" class="actual_img_style" onclick="changeImg(this.id)" src="{{$product['image2']}}">
            </div>
        </div>
        <div class="individual_prod_mainimg">
            <img  class="prod_main_img" id="main_img" src="{{$product['image1']}}">
        </div>      
    </div>
    <div class="add_to_cart_div">
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        <button onclick="addToCart({{$product}},{{Auth::user()}})" class="product_add_to_cart">Add To Cart</button>
    </div>
    </div>
    <div class="individual_prod_detail">
        <div class="product_brand_name">
            {{$product->brand}}
        </div>
        <div class="extra">
            {{$product->name}}
        </div>
        <div class="product_cost">
            ₹{{$product->cost}}
        </div>
        <div class="product_discount">
            {{$product->discount}} % off
        </div>
        <div class="product_rating">
            {{$product->rating}} &#9733;
        </div>
        <div class="product_detail_class">
         <span class="hand">&#9755;</span> 
         <span class="small_heading">Launch Date : </span> 
         <span class="answer">{{$product->launchDate->toFormattedDateString()}}</span>
        </div>
        <div class="product_detail_class">
        <span class="hand">&#9755;</span>
        <span class="small_heading">Occassion : </span>
        <span class="answer">{{$product->occassion}}</span>
        </div>
        <div class="product_detail_class">
        <span class="hand">&#9755;</span>
         <span class="small_heading">Water Resistant : </span>
        <span class="answer">{{$tf[$product->isWaterResistant]}}</span>
        </div>
        <div class="product_detail_class">
        <span class="hand">&#9755;</span>
         <span class="small_heading">Display : </span>
        <span class="answer">{{$product->display}}</span>
        </div>
        <div class="product_detail_class">
        <span class="hand">&#9755;</span>
         <span class="small_heading">Warranty Period : </span>
        <span class="answer">{{$product->warratyPeriod}}</span>
        </div>
    </div>
</div>
</body>
</html>
@endsection