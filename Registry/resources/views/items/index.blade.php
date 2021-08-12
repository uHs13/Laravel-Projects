@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-utensil-spoon text-success"></i> Items
            </div>

            <div class="card-body table-responsive">

                <table class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Storage</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item)
                       <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->storage->name }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

                {{ $items->links() }}

            </div>
        </div>

    </div>

@stop
