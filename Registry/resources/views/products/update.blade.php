@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>

        <div>

            <form action="{{ route('products.update', $product['id']) }}" method="POST" class="border rounded shadow-sm p-3 m-3">

                @csrf
                @method('PUT')

                <div class="text-center">
                    <h2><i class="fas fa-box text-info"></i> Update Product</h2>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-font fa-md text-info"></i>
                        </div>
                    </div>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name *" value="{{ $product['name'] }}">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fab fa-stack-overflow fa-md text-info"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock *" value="{{ $product['stock'] }}">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-info fa-md"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price *" value="{{ $product['price'] }}">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="categorySelect">
                            <i class="fas fa-puzzle-piece text-danger mr-1"></i>
                            Category
                        </label>
                    </div>
                    <select class="custom-select" id="categorySelect" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" @if ($product['category_id'] === $category['id'])
                                selected
                            @endif>{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-4 offset-4">
                    <button class="btn btn-info btn-block">
                        <i class="fas fa-check-circle text-light"></i> Save
                    </button>
                </div>

            </form>

        </div>

    </div>

@stop
