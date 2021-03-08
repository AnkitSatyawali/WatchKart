@extends('layouts.master')

@section('content')

<div class="profile_main">
    <div class="row profile_div">
        <div class="profile_image_div">
            <div class="profile_image">
                <img class="profile_img" src="/images/avatar.svg">
            </div>
        </div>
        <div class="profile_detail">
            <div class="profile_d_div">
                <div class="col-12 field">
                    <label class="address_label">Name : </label>
                    {{Auth::user()->name}}
                </div>
                
                <div class="col-12 field">
                    <label class="address_label">Email : </label>
                    {{Auth::user()->email}}
                </div>
                <hr>
                <div class="editicon_div">
                    @if($address)
                    <a href="/saveAddress" class="nolistyle"><img data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Address" class="editicon_img" src="/images/edit.svg"></a>
                    @endif
                </div>
                <div class="deta_head">
                    Address
                </div>
                @if($address)
                <div class="prof_addr_div">
                    <div class="prof_addressline">
                        {{$address->addressline1}}
                    </div>
                    <div class="col-12 field">
                        <label class="address_label">State : </label>
                        {{$address->state}}
                    </div>
                    <div class="col-12 field">
                        <label class="address_label">Country : </label>
                        {{$address->country}}
                    </div>
                    <div class="col-12 field">
                        <label class="address_label">Zip Code : </label>
                        {{$address->zipcode}}
                    </div>
                </div>
                @endif
                @if(!$address)
                <div class="profile_add_address_btn">
                    <a class="nolistyle" href="/saveAddress"><button class="btn">Add Address</button></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection