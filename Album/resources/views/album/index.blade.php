@extends('layouts.index')

@section('body')

    <div class="col-10 offset-1">

        <div class="card text-center">
            <div class="card-header">
                <h4 class="text-center">
                    <i class="fas fa-camera-retro fas-2x text-danger"></i>
                    Pictures
                </h4>
            </div>
            <div class="card-body row d-flex align-items-center justify-content-center">

                <div class="col-12">

                    @if (session()->has('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif

                </div>

                @foreach ($images as $image)

                    <div class="card mr-2" style="width: 18rem;">
                        <img src="{{ 'storage/' . $image->path }}" class="card-img-top" alt="Image" width="200"
                            height="200">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $image->description }}
                            </p>
                            <div class="row d-flex align-item-center justify-content-center">
                                <form action="/download/{{ $image->id }}" method="GET">
                                    @csrf
                                    <button class="btn btn-small btn-info text-light mr-1">
                                        <i class="fas fa-download"></i>
                                        Download
                                    </button>
                                </form>
                                <form action="/destroy/{{ $image->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-small btn-danger text-light">
                                        <i class="far fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="card-footer text-muted">
                {{ $images->links() }}
            </div>
        </div>

    </div>

@stop
