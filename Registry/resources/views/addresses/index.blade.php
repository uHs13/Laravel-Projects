@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Addresses</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-map-marked-alt text-secondary"></i> Addresses
            </div>

            <div class="card-body table-responsive">

                <table class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Street</th>
                            <th>District</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($addresses as $address)
                       <tr>
                            <td>{{ $address->person->id }}</td>
                            <td>{{ $address->person->name }}</td>
                            <td>{{ $address->person->email }}</td>
                            <td>{{ $address->street }}</td>
                            <td>{{ $address->district }}</td>
                            <td>{{ $address->city }}</td>
                            <td>{{ $address->state }}</td>
                            <td>{{ $address->country }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@stop
