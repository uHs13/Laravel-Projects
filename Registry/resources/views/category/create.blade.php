@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">New</li>
            </ol>
        </div>

        <div>
            <form action="/categories" method="POST" class="border rounded shadow-sm p-3 m-3">

                @csrf

                <div class="text-center">
                    <h2><i class="fas fa-puzzle-piece text-danger"></i> New Category</h2>
                </div>

                <div class="form-group">
                    <label for="name">Name<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group col-4 offset-4">
                    <button class="btn btn-danger btn-block">
                        <i class="fas fa-check-circle"></i> Save
                    </button>
                </div>

            </form>
        </div>

    </div>

@stop
