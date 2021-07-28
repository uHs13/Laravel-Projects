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
                    <input type="text" name="name" id="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" placeholder="Name *" value="@if (old('name')) {{ old('name') }} @else {{ $product['name'] }} @endif">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fab fa-stack-overflow fa-md text-info"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control {{ ($errors->has('stock')) ? 'is-invalid' : '' }}" id="stock" name="stock" placeholder="Stock *" value="@if (old('stock')) {{ old('stock') }} @else {{ $product['stock'] }} @endif">
                    @if ($errors->has('stock'))
                        <div class="invalid-feedback">
                            {{ $errors->first('stock') }}
                        </div>
                    @endif
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-info fa-md"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control {{ ($errors->has('price')) ? 'is-invalid' : '' }}" id="price" name="price" placeholder="Price *" value="@if (old('price')) {{ old('price') }} @else {{ $product['price'] }} @endif">
                    @if ($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="categorySelect">
                            <i class="fas fa-puzzle-piece text-danger mr-1"></i>
                            Category
                        </label>
                    </div>
                    <select class="custom-select {{ ($errors->has('category')) ? 'is-invalid' : '' }}" id="categorySelect" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" @if ($product['category_id'] === $category['id'] || old('category_id') == $category['id'])
                                selected
                            @endif>{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category') }}
                        </div>
                    @endif
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
