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
                @foreach ($images as $image)

                    <div class="card mr-2" style="width: 18rem;">
                        <img src="{{ 'storage/' . $image->path }}" class="card-img-top" alt="Image" width="200" height="200">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $image->description }}
                            </p>
                            <div class="row d-flex align-item-center justify-content-center">
                                <a href="" class="btn btn-small btn-info text-light mr-1">
                                    <i class="fas fa-download"></i>
                                    Download
                                </a>
                                <a href="" class="btn btn-small btn-danger text-light">
                                    <i class="far fa-trash-alt"></i>
                                    Delete
                                </a>
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
