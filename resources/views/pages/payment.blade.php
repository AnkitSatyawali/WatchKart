@extends('layouts.master')

@section('content')

<div class="payment_main">
    <table class="table table-striped table-hover payment-table">
        <thead class="table-dark">
            <tr>
            <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
                <div>{{$result->addressline1}}</div>
                <div>{{$result->state}}</div>
                <div>{{$result->country}}</div>
                <div>{{$result->zipcode}}</div>
                <div><a class="nolistyle" href="/saveAddress"><button class="btn-primary address_btn">Change Address</button></a></div>
            </td>
            </tr>
        </tbody>
    </table>


    <table class="table table-striped table-hover paymentmethod-table">
        <thead class="table-dark">
            <tr>
            <th scope="col">Payment Method</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td class="payment_options">
                <form method="POST" action="/bookOrder">
                    {{csrf_field()}}
                    <div class="form-check">
                        <input class="form-check-input" value="Credit Card" type="radio" name="option" id="op1" checked>
                        <label class="form-check-label" for="op1">
                            Credit Card
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Debit Card" type="radio" name="option" id="op2">
                        <label class="form-check-label" for="op2">
                            Debit Card
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Cash On Delivery" type="radio" name="option" id="op3">
                        <label class="form-check-label" for="op3">
                            Cash On Delivery
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="UPI" type="radio" name="option" id="op4">
                        <label class="form-check-label" for="op4">
                            UPI
                        </label>
                    </div>
                    <div class="order_btn"><button type="submit" class="btn-primary address_btn">Confirm Order</button></div>
                </form>
            </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection