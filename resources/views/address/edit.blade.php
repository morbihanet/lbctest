@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit an address</h1>
        <form id="addForm" action="{{route('address.update', ['address' => $address])}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <div class="form-group">
                <label for="firstname">Street</label>
                <input required="required" class="form-control" type="text" name="street" id="street"
                       value="{{$address->street}}">
            </div>
            <div class="form-group">
                <label for="lastname">Postal Code</label>
                <input required="required" class="form-control" type="text" name="zip" id="zip"
                       value="{{$address->zip}}">
            </div>
            <div class="form-group">
                <label for="lastname">City</label>
                <input required="required" class="form-control" type="text" name="city" id="city"
                       value="{{$address->city}}">
            </div>
            <div class="form-group">
                <label for="lastname">Country</label>
                <input required="required" class="form-control" type="text" name="country" id="country"
                       value="{{$address->country}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection