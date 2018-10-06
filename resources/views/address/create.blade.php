@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add an address</h1>
        <form id="addForm" action="{{route('address.store', ['contact' => $contact])}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="firstname">Street</label>
                <input required="required" class="form-control" type="text" name="street" id="street">
            </div>
            <div class="form-group">
                <label for="lastname">Postal Code</label>
                <input required="required" class="form-control" type="text" name="zip" id="zip">
            </div>
            <div class="form-group">
                <label for="lastname">City</label>
                <input required="required" class="form-control" type="text" name="city" id="city">
            </div>
            <div class="form-group">
                <label for="lastname">Country</label>
                <input required="required" class="form-control" type="text" name="country" id="country">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection