@extends('base')
@section('title','drivers')
@section('content')
    <h1 class="text-center">Driver: {{ $driver->id }}</h1>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $driver->id }}</td>
        </tr>
        <tr>
            <th>First Name</th>
            <td>{{ $driver->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $driver->last_name }}</td>
        </tr>
        <tr>
            <th>Nationality</th>
            <td>{{ $driver->nationality }}</td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{ $driver->city }}</td>
        </tr>
        <tr>
            <th>Referall</th>
            <td>@if ( $driver->referall ) {{ $driver->referall }} @else {{'Empty'}} @endif{{ $driver->referall }}</td>
        </tr>
        <tr>
            <th>IBAN</th>
            <td>{{ $driver->iban }}</td>
        </tr>
        <tr>
            <th>National ID</th>
            <td>{{ $driver->National_id }}</td>
        </tr>
        <tr>
            <th>Vehicule Type</th>
            <td>{{ $driver->vehicule_type }}</td>
        </tr>
        <tr>
            <th>National card</th>
            <td><img class="img-fluid" style="max-width:200px"  src="{{ $driver->national_card }}" alt=""></td>
        </tr>
        <tr>
            <th>Driving Licence Card</th>
            <td><img class="img-fluid" style="max-width:200px" src="{{ $driver->driving_licence_card }}" alt=""></td>
        </tr>
        <tr>
            <th>Car Registration Card</th>
            <td><img class="img-fluid" style="max-width:200px" src="{{ $driver->car_registration_card }}" alt=""></td>
        </tr>
        <tr>
            <th>Driving authorizing</th>
            <td><img class="img-fluid" style="max-width:200px" src="{{ $driver->driving_authorizing }}" alt=""></td>
        </tr>
        <tr>
            <th>Bank account card</th>
            <td><img class="img-fluid" style="max-width:200px" src="{{ $driver->bank_account_card }}" alt=""></td>
        </tr>

        </tbody>
    </table>
    <a href="{{ route('driver.index')}}" class="text-right">Return to list of drivers</a>

@endsection