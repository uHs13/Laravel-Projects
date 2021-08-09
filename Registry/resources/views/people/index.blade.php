@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">People</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-users"></i> People
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
                      @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->email }}</td>
                            <td>{{ $person->address->street }}</td>
                            <td>{{ $person->address->district }}</td>
                            <td>{{ $person->address->city }}</td>
                            <td>{{ $person->address->state }}</td>
                            <td>{{ $person->address->country }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@stop
