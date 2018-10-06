@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message_flash'))
            <p class="message_flash alert {{ Session::get('class_flash', 'alert-info') }}">{{ Session::get('message_flash') }}</p>
        @endif
        <p><a class="btn btn-primary" href="{{ route('address.create', ['contact' => $contact]) }}"><i class="fa
        fa-plus"></i> Add an address to
                &laquo; {{
        $contact->firstname }} {{ $contact->lastname }} &raquo;</a></p>
        <p><a class="btn btn-warning" href="{{ route('edit', ['contact' => $contact]) }}"><i class="fa fa-edit"></i>
                Edit contact &laquo; {{ $contact->firstname }} {{ $contact->lastname }} &raquo;</a></p>
        <p><a class="btn btn-success" href="{{ route('index') }}"><i class="fa fa-list"></i> Your Contact List</a></p>
        <h1>
            Address list
        </h1>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Street</th>
                <th>Postal Code</th>
                <th>City</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
            @foreach ($contact->addressesRaw()->orderBy('created_at', 'DESC')->get() as $address)
                <tr>
                    <td>{{$address->street}}</td>
                    <td>{{$address->zip}}</td>
                    <td>{{$address->city}}</td>
                    <td>{{$address->country}}</td>
                    <td><a href="{{route('address.edit', ['address' => $address])}}" class="btn
                                    btn-primary"><i class="fa fa-edit"></i> Edit address</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
