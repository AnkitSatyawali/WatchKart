@extends('layouts.master')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active dot" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="dot" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="dot" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/second.jpg" class="carasoul-img d-block w-100" alt="...">
      <div class="carousel-caption slide2 d-none d-md-block">
        <h5>Try out our latest launches</h5>
        <button type="button" href="/products&categories/3" class="btn btn-lg btn-primary"><a class="nolistyle" href="/products&categories/3">Check Now</a></button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/images/third.jpg" class="carasoul-img d-block w-100" alt="...">
      <div class="carousel-caption slide3 d-none d-md-block">
        <h5>Checkout Our Bestsellers</h5>
        <a class="nolistyle" href="/products&categories/2"><button type="button"  class="btn btn-lg btn-primary">Try Out</button></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/images/fourth.jpg" class="carasoul-img d-block w-100" alt="...">
      <div class="carousel-caption slide1 d-none d-md-block">
        <h5>Welcome to our E-store</h5>
        <a class="nolistyle" href="/products/all"><button type="button" class="btn btn-lg btn-primary">Check our products</button></a>
      </div>
    </div>
  </div>
  
</div>

<div class="conatiner secondPart">
    <div class="row align-items-start">
        <div class="col">
            <div class="products">
                <div class="prod_img_div"><img class="prod_img" src="/images/smartband.jpg"></div>
                <div class="prod_caption">
                    <div>New Brands Introduced</div>
                    <h4>Smartbands</h4>
                    <button type="button" class="btn btn-lg btn-primary"><a class="nolistyle" href="/products/type&Smart Band">Shop Now</a></button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class=products>
                <div class="prod_img_div wrst_img"><img class="prod_img" src="/images/watch.jpg"></div>
                <div class="prod_caption">
                    <div>New Styles Introduced</div>
                    <h4>Wrist Watches</h4>
                    <button type="button" class="btn btn-lg btn-primary"><a class="nolistyle" href="/products/type&Wrist Watch">Shop Now</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="thirdPart">
    <div class="heading">
        <span class="span_style">Trending Products</span>
    </div>
    <div class="productsc">
    @foreach($trending as $trend)
      <div class="product_list">
        <div class="product">
          <a class="remove_link_color" href="/product/{{$trend['id']}}">
            <div class="product_img_div">
              <img class="product_img" src="{{$trend['image1']}}" >
              <div class="wishicon">&#10084;	</div>
            </div>
          </a>
            <div id="pname" class="product_name">{{$trend['name']}}</div>
              <div class="rating">
              </div>
              <div id="cost" class="price">₹{{$trend['cost']}}</div>
              <div class="add_to_cart">
              <meta name="csrf_token" content="{{ csrf_token() }}" />
                <button onclick="addToCart({{$trend}},{{Auth::user()}})" class="add_cart_btn">Add To Cart</button>
              </div>
            </div>
          </div>
          @endforeach
      </div>
  </div>

  <div class="thirdPart">
    <div class="heading">
        <span class="span_style">New Launches</span>
    </div>
    <div class="productsc">
    @foreach($newLaunch as $launch)
      <div class="product_list">
        <div class="product">
          <a class="remove_link_color" href="/product/{{$launch['id']}}">
            <div class="product_img_div">
              <img class="product_img" src="{{$launch['image1']}}" >
              <div class="wishicon">&#10084;	</div>
            </div>
          </a>
            <div class="product_name">{{$launch['name']}}</div>
              <div class="rating">
              </div>
              <div class="price">₹{{$launch['cost']}}</div>
              <div class="add_to_cart">
                <meta name="csrf_token" content="{{ csrf_token() }}" />
                <button onclick="addToCart({{$trend}},{{Auth::user()}})" class="add_cart_btn">Add To Cart</button>
              </div>
        </div>
        
          </div>
          @endforeach
      </div>
  </div>

  <div class="thirdPart">
    <div class="heading">
        <span class="span_style">Best Sellers</span>
    </div>
    <div class="productsc">
    @foreach($bestSellers as $best)
      <div class="product_list">
        <div class="product">
          <a class="remove_link_color" href="/product/{{$best['id']}}">
            <div class="product_img_div">
              <img class="product_img" src="{{$best['image1']}}" >
              <div class="wishicon">&#10084;	</div>
            </div>
          </a>
            <div class="product_name">{{$best['name']}}</div>
              <div class="rating">
              </div>
              <div class="price">₹{{$best['cost']}}</div>
              <div class="add_to_cart">
                <meta name="csrf_token" content="{{ csrf_token() }}" />
                <button onclick="addToCart({{$trend}},{{Auth::user()}})" class="add_cart_btn">Add To Cart</button>
              </div>
            </div>
          </div>
          @endforeach
      </div>
  </div>

  <div class="fourthPart">
    <div class="productsc">
         <div class="testimonial_col">
          <div class="testimonial">            
            <div class="inverted_commas"><img class="quotation" src="/images/quotation-marks.svg"></div>
              <div class="review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              <div class="user_image_div">
              <div class="user_img_div">
                <img class="user_img" src="/images/avatar.svg" >
              </div>
              <div class="user_name">Ankit Satyawali</div>
              </div>
            </div>
          </div>

        <div class="testimonial_col">
          <div class="testimonial">            
            <div class="inverted_commas"><img class="quotation" src="/images/quotation-marks.svg"></div>
              <div class="review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              <div class="user_image_div">
              <div class="user_img_div">
                <img class="user_img" src="/images/avatar.svg" >
              </div>
              <div class="user_name">Ankit Satyawali</div>
              </div>
            </div>
          </div>

          <div class="testimonial_col">
          <div class="testimonial">            
            <div class="inverted_commas"><img class="quotation" src="/images/quotation-marks.svg"></div>
              <div class="review">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
              <div class="user_image_div">
              <div class="user_img_div">
                <img class="user_img" src="/images/avatar.svg" >
              </div>
              <div class="user_name">Ankit Satyawali</div>
              </div>
            </div>
          </div>

      </div>
  </div>
@endsection