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

            <form action="{{ route('clients.update', $client->id) }}" method="POST" class="border rounded shadow-sm p-3 m-3">

                @csrf
                @method('PUT')

                <div class="text-center">
                    <h2><i class="fas fa-user text-success"></i> New Client</h2>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-font fa-md text-success"></i>
                        </div>
                    </div>
                    <input type="text" name="name" id="name" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" placeholder="Name *" value="@if (old('name')) {{ old('name') }} @else {{ $client->name }} @endif">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-envelope text-success"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Email *" value="@if (old('email')) {{ old('email') }} @else {{ $client->email }} @endif">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-map-marked-alt text-success"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control {{ ($errors->has('address')) ? 'is-invalid' : '' }}" id="address" name="address" placeholder="Address *" value="@if (old('address')) {{ old('address') }} @else {{ $client->address }} @endif">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
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
