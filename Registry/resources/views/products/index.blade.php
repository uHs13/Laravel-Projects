@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-box text-info"></i> Products
            </div>

            <div class="card-body table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td class="row">

                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit text-light"></i> Edit</a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt text-light"></i>
                                            Delete</button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $products->links() }}

                <a href="{{ route('products.create') }}" class="btn btn-block btn-info">
                    <i class="fas fa-plus-circle text-light"></i> New
                </a>

            </div>
        </div>

    </div>

@stop
