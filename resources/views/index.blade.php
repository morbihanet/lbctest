@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message_flash'))
            <p class="message_flash alert {{ Session::get('class_flash', 'alert-info') }}">{{ Session::get('message_flash') }}</p>
        @endif
        <p><a class="btn btn-primary" href="{{ route('create') }}">Add a contact</a></p>
        <h1>
            Contact list
        </h1>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Addresses</th>
                <th>Action</th>
            </tr>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->firstname }}</td>
                    <td>{{ $contact->lastname }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        @if ($contact->addresses()->count() > 0)
                        <table class="table table-bordered table-striped">
                            @foreach ($contact->addresses() as $address)
                                <tr>
                                    <td>{{$address->street}} {{$address->zip}} {{$address->city}}, {{$address->country}}</td>
                                    <td><a href="{{route('address.edit', ['address' => $address])}}" class="btn
                                    btn-primary"><i class="fa fa-edit"></i> Edit address</a></td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <div class="alert alert-info">
                                <p>No Address</p>
                                <p><a href="{{route('address.create', ['contact' => $contact])}}" class="btn
                                btn-primary"><i class="fa fa-plus"></i> Add an address</a></p>
                            </div>
                        @endif
                    </td>
                    <td><a href="{{route('edit', ['contact' => $contact])}}" class="btn btn-success"><i class="fa
                    fa-edit"></i> Edit contact</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
