@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Departments</li>
            </ol>

        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-building fa-dark"></i> Departments
            </div>

            <div class="card-body table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>

                <button class="btn btn-block btn-dark" id="btnmodal" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus-circle text-light"></i> New
                </button>

            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">
                        <i class="fas fa-building fa-dark"></i> New Department
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-font fa-md text-dark"></i>
                                </div>
                            </div>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name *">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-file-alt text-dark"></i>
                                </span>
                            </div>
                            <textarea id="description" name="description" class="form-control" aria-label="Description" placeholder="Description *"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i>
                        Close</button>
                    <button type="button" class="btn btn-dark"><i class="fas fa-plus-circle text-light"></i> Save</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')
<script src="{{ asset('js/functions/clearform.js') }}"></script>
<script src="{{ asset('js/classes/Fetch/Fetch.js') }}"></script>
<script src="{{ asset('js/classes/Department/Department.js') }}"></script>
<script src="{{ asset('js/classes/Table/Table.js') }}"></script>
<script src="{{ asset('js/classes/main/main.js') }}"></script>
@stop