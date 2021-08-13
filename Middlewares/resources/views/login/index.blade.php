@extends('layouts.app')

@section('body')

    <section class="col-lg-10 offset-1">

        <div class="col-12 d-flex align-item-center justify-content-center">

            <div class="card p-3 shadow col-lg-10">
                <div class="row no-gutters">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/login.png') }}" alt="Login" width="300" height="200">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title text-center m-4">Identification</h5>
                            <form action="{{ route('login') }}" method="POST">

                                @csrf

                                @if (session()->has('error'))

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @endif

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="login-icon">
                                            <i class="fas fa-user" style="color:orange"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}"
                                        name="login" id="login" placeholder="Login..." aria-label="login"
                                        aria-describedby="login-icon">
                                    @if ($errors->has('login'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('login') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="password-icon">
                                            <i class="fas fa-lock" style="color:orange"></i>
                                        </span>
                                    </div>
                                    <input type="password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        name="password" id="password" placeholder="Password..." aria-label="password"
                                        aria-describedby="password-icon">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-outline-dark btn-block">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@stop
