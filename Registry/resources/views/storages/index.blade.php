@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Storages</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-boxes text-primary"></i> Storages
            </div>

            <div class="card-body table-responsive">
                        @foreach ($storages as $storage)
                            <div class="accordion m-2" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="heading{{ $storage->name }}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapse{{ $storage->name }}"
                                                aria-expanded="true" aria-controls="collapse{{ $storage->name }}">
                                                {{ $storage->name }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse{{ $storage->name }}" class="collapse"
                                        aria-labelledby="heading{{ $storage->name }}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="card">
                                                <h5 class="card-header"><i class="fas fa-utensil-spoon text-success"></i>
                                                    Items</h5>
                                                <div class="card-body">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($storage->items as $it)
                                                                <tr>
                                                                    <td>{{ $it->id }}</td>
                                                                    <td>{{ $it->name }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                {{ $storages->links() }}
            </div>
        </div>

    </div>

@stop
