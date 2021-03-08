@extends('layouts.master')

@section('content')

<div class="cart_main">
@if(count($products)>0)
<table class="table table-light table-striped table-hover cart_table">
  <thead class="table-dark">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Cost</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td style="width:40%">{{$product->name}}</td>
      <td>{{$product->quantity}}</td>
      <td>₹{{$product->cost}}</td>
      <td>
          <meta name="csrf_token" content="{{ csrf_token() }}" />
          <button class="btn-primary" onclick="increase({{$product}},{{Auth::user()}})">Add</button>
          &nbsp;&nbsp;
          <meta name="csrf_token" content="{{ csrf_token() }}" />
          <button class="btn-danger" onclick="decrease({{$product}},{{Auth::user()}})">Remove</button>
      </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
      <tr>
        <th scope="row"></th>
        <td></td>
        <td>GST(18%)</td>
        <td>₹{{$gst}}</td>
        <td></td>
      </tr>

      <tr>
        <th scope="row"></th>
        <td></td>
        <td>Total Amount</td>
        <td>₹{{$grandTotal}}</td>
        <td></td>
      </tr>
  </tfoot>
</table>
<div class="checkout_btn">
<button onclick="checkout()" class="btn btn-primary"><a href="/paymentMethod" class="nolistyle">Poceed To Checkout</a></button>
</div>
@endif

@if(count($products)==0)
<div class="empty_cart">
    <img class="empty_cart_img" src="/images/emptycart.svg">
</div>
<div class="empty_cart_caption">Add Items In Your Cart</div>
@endif

</div>

@endsection