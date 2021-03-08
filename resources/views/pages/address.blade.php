@extends('layouts.master')

@section('content')

<div class="address_main">
    <form class="row g-3 address_form" method="POST" action='/saveAddress'>
      {{csrf_field()}}
      @foreach($errors->all() as $error)
              <div class="err">
                  {{$error}}
              </div>
      @endforeach
      <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
      </div>
      <div class="col-md-6">
        <label for="state" class="form-label">State</label>
        <select id="state" name="state" class="form-select" required>
            <option selected>Select</option>
            @foreach($states as $state)  
                <option>{{$state->name}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-md-4">
        <label for="country" class="form-label">Country</label>
        <select id="country" name="country" class="form-select" required>
          <option selected>India</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="zip" class="form-label">Zip</label>
        <input type="number" name="zip" class="form-control" id="zip" required>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Save Address</button>
      </div>
    </form>
</div>
@endsection