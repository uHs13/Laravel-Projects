@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row p-3">
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <h5 class="card-header"><i class="fas fa-box text-info"></i> Products</h5>
                    <div class="card-body">
                        <h5 class="card-title text-center">Product Registration</h5>
                        <a href="/products" class="btn btn-block btn-primary"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <h5 class="card-header"><i class="fas fa-puzzle-piece text-danger"></i> Categories</h5>
                    <div class="card-body">
                        <h5 class="card-title text-center">Category Registration</h5>
                        <a href="/categories" class="btn btn-block btn-danger"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-sm-6">
                <div class="card shadow-sm">
                    <h5 class="card-header"><i class="fas fa-user text-success"></i> Clients</h5>
                    <div class="card-body">
                        <h5 class="card-title text-center">Client Registration</h5>
                        <a href="/clients" class="btn btn-block btn-success"><i class="fas fa-arrow-right text-light"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
