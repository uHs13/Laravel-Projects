@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-puzzle-piece text-danger"></i> Categories
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
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="row">

                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info mr-2"><i class="fas fa-edit text-light"></i> Edit</a>

                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-light"><i class="fas fa-trash-alt text-dark"></i> Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$categories->links()}}

                <a href="/categories/create" class="btn btn-block btn-danger">
                    <i class="fas fa-plus-circle"></i> New
                </a>

            </div>
        </div>

    </div>

@stop
