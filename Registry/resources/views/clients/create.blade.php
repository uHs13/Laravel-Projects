@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/clients">Clients</a></li>
                <li class="breadcrumb-item active" aria-current="page">New</li>
            </ol>
        </div>

        <div>

            <form action="{{ route('clients.store') }}" method="POST" class="border rounded shadow-sm p-3 m-3">

                @csrf

                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                @endif

                <div class="text-center">
                    <h2><i class="fas fa-user text-success"></i> New Client</h2>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-font fa-md text-success"></i>
                        </div>
                    </div>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name *" value="{{ old('name') }}">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-envelope text-success"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email *" value="{{ old('email') }}">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-map-marked-alt text-success"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address *" value="{{ old('address') }}">
                </div>

                <div class="form-group col-4 offset-4">
                    <button class="btn btn-success btn-block">
                        <i class="fas fa-check-circle text-light"></i> Save
                    </button>
                </div>

            </form>

        </div>

    </div>

@stop
