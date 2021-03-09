@extends('layouts.master')

@section('content')

<div class="order_main">
    <div class="order_detail">
        <div class="order_heading">My Order</div>
        <div class="row order_detail_div" >
            <div class="col">
                <div class="detail_heading">Order ID : {{$order->id}}</div>
                <div class="detail_heading">Ordered On : {{$order->created_at->toFormattedDateString()}}</div>
            </div>
            <div class="col right_col">
                <div class="detail_heading">Order Status : {{ucfirst($order->status)}}</div>
                <div class="detail_heading">Payment Method : {{$order->paymentType}}</div>
            </div>
        </div>
        <table class="table table-striped table-hover order_table">
            <thead class="table-dark">
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">No. Of Units</th>
                <th scope="col">Total Cost</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$product->products_id}}</td>
                        <td class="order_prod_name">{{$product->products_name}}</td>
                        <td>{{$product->products_quantity}}</td>
                        <td>₹ {{$product->products_cost}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>GST(18%)</td>
                    <td>₹{{$order->total-$order->subtotal}}</td>
                </tr>

                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td>Total Amount</td>
                    <td>₹{{$order->total}}</td>
                </tr>
            </tfoot>
        </table>
        @if($order->status=='processing')
        <div class="order_cancel">
            <a class="nolistyle" href="/cancelOrder/{{$order->id}}"><button class="btn order_cancel_btn">Cancel Order</button></a>
        </div>
        @endif
    </div>
</div>

@endsection