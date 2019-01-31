@extends('base')
@section('title','drivers')
@section('content')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Mobile number</th>
            <th scope="col">Nationality</th>
            <th scope="col">City</th>
            <th scope="col">Referall</th>
            <th scope="col">IBAN</th>
            <th scope="col">National ID</th>
            <th scope="col">Vehicule Type</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($drivers as $driver)
        <tr>
            <th scope="row">{{ $driver->id }}</th>
            <td>{{ $driver->first_name }}</td>
            <td>{{ $driver->last_name }}</td>
            <td>{{ $driver->mobile_number }}</td>
            <td>{{ $driver->nationality }}</td>
            <td>{{ $driver->city }}</td>
            <td>{{ $driver->referall }}</td>
            <td>{{ $driver->iban }}</td>
            <td>{{ $driver->National_id }}</td>
            <td>{{ $driver->vehicule_type }}</td>
            <td><a href="{{ route('driver.show', ['$driver' => $driver]) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('driver.edit', ['$driver' => $driver]) }}" class="btn btn-success">Edit</a>
                {!!Form::open(['action' => ['DriverController@destroy', $driver], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </td>

        @endforeach

        </tbody>
    </table>

@endsection