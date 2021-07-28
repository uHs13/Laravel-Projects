@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clients</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-user text-success"></i> Clients
            </div>

            <div class="card-body table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($clients as $client)

                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td class="row">
                                    <a href="{{ route('clients.edit', $client->id) }}" class="mr-1 btn btn-info"><i class="fas fa-edit text-light mr-1"></i>Edit</a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt text-light mr-1"></i>Delete</a></button>
                                    </form>
                                </td>
                            </tr>

                       @endforeach
                    </tbody>
                </table>

                {{ $clients->links() }}

                <a href="{{ route('clients.create') }}" class="btn btn-block btn-success">
                    <i class="fas fa-plus-circle text-light"></i> New
                </a>

            </div>
        </div>

    </div>

@stop
