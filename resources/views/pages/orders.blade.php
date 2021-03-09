@extends('layouts.master')

@section('content')

<div class="orders_main">
    <div class="order_heading">My Orders</div>
    @if(count($orders)>0)
    <table class="table table-striped table-hover orders_table">
        <thead class="table-dark">
            <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Ordered On</th>
            <th scope="col">Order Status</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Amount</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->created_at->toFormattedDateString()}}</td>
                    <td>{{ucfirst($order->status)}}</td>
                    <td>{{$order->paymentType}}</td>
                    <td>₹ {{$order->total}}</td>
                    <td>
                        <a href="/order/{{$order->id}}" class="nolistyle"><button class="btn-primary">View</button></a>
                        @if($order->status=='processing')
                        <a href="/cancelOrder/{{$order->id}}" class="nolistyle"><button class="btn-danger">Cancel</button></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination_links">
        <div class="pagination_links_inner">{{$orders->links()}}</div>
    </div>
    @endif

    @if(count($orders)==0)
    <div class="notFound_div notFound_order">
        <img class="notFound_img" src="/images/notFound.svg">
    </div>
    <div class="notFound_text notFound_order_text">Please have an order first</div>
    @endif
</div>

@endsection