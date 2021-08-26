@extends('layouts.index')

@section('body')

    <div class="col-8 offset-2">

        <div class="media border rounded p-5 bg-white col-12">
            <img src="{{ asset('img/camera.png') }}" class="mr-3" alt="Camera" width="200" height="200">
            <div class="media-body">
                <form action="" method="POST" enctype="multipart/form-data">

                    @csrf

                    <h4 class="text-center">
                        <i class="fas fa-cloud-upload-alt fas-2x text-danger"></i>
                        Picture Upload
                    </h4>

                    <div class="p-3">

                        @if (session()->has('success'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-keyboard"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="description" placeholder="Description"
                                aria-label="Description">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-image"></i>
                                </span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file" id="file" class="custom-file-input"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Image</label>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <img src="{{ asset('img/default.jpg') }}" alt="Image" width="400" height="400"
                                id="image-preview">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-danger btn-block">
                                Save
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>

    <div class="position-fixed bottom-0 right-0 p-3" style="position: absolute; top: 0; right: 0;">
        <div id="liveToast" class="toast hide bg-green" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="2000">
            <div class="toast-header">
                <strong class="mr-auto toast-title"></strong>
                <button type="button" class="ml-2 mb-1 close text-danger" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body text-light">
            </div>
        </div>
    </div>

@stop

@section('javascript')
    <script>
        window.addEventListener('load', () => {

            document.querySelector('button').disabled = true;

        });

        document.querySelector("#file").addEventListener("change", function() {

            var file = new FileReader();

            file.onload = function() {

                document.querySelector('#image-preview').src = file.result;
                document.querySelector('button').disabled = false;

                toast('success', 'Picture succesfully loaded');

            }

            file.onerror = function() {

                toast('error', 'Error while loading picture');

            }

            if (this.files[0]) file.readAsDataURL(this.files[0]);

        });

        function toast(status, text) {

            let color = (status == 'success') ? 'bg-success' : 'bg-danger';
            let title = (status = 'success') ? 'Success' : 'Error';

            document.querySelector('#liveToast').classList.add(color);
            document.querySelector('.toast-title').innerHTML = title;
            document.querySelector('.toast-body').innerHTML = text;

            $('#liveToast').toast('show');
        }
    </script>
@stop
