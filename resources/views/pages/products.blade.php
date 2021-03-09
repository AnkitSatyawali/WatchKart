@extends('layouts.master')

@section('content')

<div class="product_main">
    <div class="product_options">
        <div class="options_heading"> Filters </div>
        <div class="option_label" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                   Type of Product <div class="arrow_div"><i class="arrow down"></i></div>
        </div>
        <div class="collapse collapsen" id="collapse1">
                <ul>
                    <li><a class="nolistyle" href="/products/type&Smart Band">Smart Band</a></li>
                    <li><a class="nolistyle" href="/products/type&Wrist Watch">Wrist Watch</a></li>
                </ul>
        </div>
        

        <div class="option_label" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                Categories <div class="arrow_div"><i class="arrow down"></i></div>
        </div>
        <div class="collapse collapsen" id="collapse2">
                <ul>
                    <li><a class="nolistyle" href="/products&categories/1">Trending</a></li>
                    <li><a class="nolistyle" href="/products&categories/2">Best Seller</a></li>
                    <li><a class="nolistyle" href="/products&categories/3">New Launch</a></li>
                </ul>
        </div>


        <div class="option_label" data-bs-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                    Brands <div class="arrow_div"><i class="arrow down"></i></div>
        </div>
        <div class="collapse collapsen" id="collapse3">
                <ul>
                    <li><a class="nolistyle" href="/products/brand&Puma">Puma</a></li>
                    <li><a class="nolistyle" href="/products/brand&Fasttrack">Fasttrack</a></li>
                    <li><a class="nolistyle" href="/products/brand&Casio">Casio</a></li>
                    <li><a class="nolistyle" href="/products/brand&Sonata">Sonata</a></li>
                    <li><a class="nolistyle" href="/products/brand&BMW">BMW</a></li>
                    <li><a class="nolistyle" href="/products/brand&Jaguar">Jaguar</a></li>
                    <li><a class="nolistyle" href="/products/brand&Rolex">Rolex</a></li>
                    <li><a class="nolistyle" href="/products/brand&Fossil">Fossil</a></li>
                    <li><a class="nolistyle" href="/products/brand&Titan">Titan</a></li>
                </ul>
        </div>

        <div class="option_label" data-bs-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
                    Gender <div class="arrow_div"><i class="arrow down"></i></div>
        </div>
        <div class="collapse collapsen" id="collapse4">
                <ul>
                    <li><a class="nolistyle" href="/products/gender&women">Women</a></li>
                    <li><a class="nolistyle" href="/products/gender&men">Men</a></li>
                </ul>
        </div>


        <div class="option_label" data-bs-toggle="collapse" href="#collapse5" role="button" aria-expanded="false" aria-controls="collapse5">
                    Ocassion <div class="arrow_div"><i class="arrow down"></i></div>
        </div>
        <div class="collapse collapsen" id="collapse5">
                <ul>
                    <li><a class="nolistyle" href="/products/occassion&Party Wear">Party wear</a></li>
                    <li><a class="nolistyle" href="/products/occassion&Casual">Casual</a></li>
                    <li><a class="nolistyle" href="/products/occassion&Formal Wear">Formal</a></li>
                </ul>
        </div>

    </div>

    @if(count($products)>0)
    <div class="products_listing">
        @foreach($products as $product)
            <a class="remove_link_color" href="/product/{{$product['id']}}">
                <div class="product_card">
                    <div class="productlist_image_div">
                        <img class="productlist_img" src="{{$product['image1']}}">
                    </div>
                    <div class="product_detail_div">
                        <div class="wishiconn">&#10084;	</div>
                        <div class="product_detail">
                            <div class="detail_name">{{$product['name']}}</div>
                            <ul class="other_details">
                                <li>{{$product['type']}}</li>
                                <li>Launched on {{$product['launchDate']}}</li>
                                <li>Brand Name : {{$product['brand']}}</li>
                                <li>{{$product['occassion']}}</li>
                                <li>Water Resistant : {{$product['isWaterResistant']}}</li>
                                <li>{{$product['display']}}</li>
                                <li>Warranty : {{$product['warratyPeriod']}}</li>
                            </ul>
                        </div>
                        <div class="cost_detail">
                            <h2>₹ {{$product['cost']}}</h2>
                            <h4>{{$product['discount']}}% Discount</h4>
                            <p>No cost Emi</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    <div class="pagination_links">
        <div class="pagination_links_inner">{{$products->links()}}</div>
    </div>
    </div>
    @endif

    @if(count($products)==0)
    <div class="notFound_style">
        <div class="notFound_div">
            <img class="notFound_img" src="/images/notFound.svg">
        </div>
        <div class="notFound_text">No Product Found</div>
    </div>
    @endif
</div>

@endsection
<!--$post->created_at-->