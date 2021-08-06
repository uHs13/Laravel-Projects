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

                <button class="btn btn-block btn-dark" id="modalbtn" data-toggle="modal" data-target="#modal">
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
                        <i class="fas fa-building fa-dark"></i>
                        <span id='modal-title'>New Department</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <form action="" id='form'>
                    <div class="modal-body">

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
                            <textarea id="description" name="description" class="form-control" aria-label="Description"
                                placeholder="Description *"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnclose" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas fa-times-circle"></i>
                            Close</button>
                        <button type="submit" class="btn btn-dark"><i class="fas fa-plus-circle text-light"></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">
                        <i class="fas fa-building fa-dark"></i>
                        <span id='modal-title'>Edit Department</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal-edit" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <form action="" id='form-edit'>
                    <div class="modal-body">

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
                            <textarea id="description" name="description" class="form-control" aria-label="Description"
                                placeholder="Description *"></textarea>
                        </div>
                        <input type="hidden" class="hide" name="id" id="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnclose-edit" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas fa-times-circle"></i>
                            Close</button>
                        <button type="submit" class="btn btn-dark"><i class="fas fa-plus-circle text-light"></i>
                            Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 right-0 p-3" style="position: absolute; top: 0; right: 0;">
    <div id="liveToast" class="toast hide bg-green" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
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
    <script src="{{ asset('js/classes/Form/Form.js') }}"></script>
    <script src="{{ asset('js/classes/Fetch/Fetch.js') }}"></script>
    <script src="{{ asset('js/classes/Department/Department.js') }}"></script>
    <script src="{{ asset('js/classes/Table/Table.js') }}"></script>
    <script>

        let table = new Table('tbody');

        window.addEventListener('load', () => {

            bindModalbtn();

            buildTable();

            document.querySelector('#form').addEventListener('submit', e => {

                e.preventDefault();

                let department = new FormData(document.querySelector('#form'));

                Department.store("{{ csrf_token() }}", department).then(res => {
                    buildTable();
                    department = formDataJson(department);
                    toast(res.status, department, {
                        success: `${department.name} successfully added`,
                        error: 'error while adding register. Please try again'
                    });
                    document.querySelector('#btnclose').click();
                });

            });

            document.querySelector('#form-edit').addEventListener('submit', e => {

                e.preventDefault();

                let department = new FormData(document.querySelector('#form-edit'));
                department.append('_method', 'PATCH');

                Department.update("{{ csrf_token() }}", department).then(res => {
                    buildTable();
                    department = formDataJson(department);
                    toast(res.status, department, {
                        success: `${department.name} successfully edited`,
                        error: 'error while editing register. Please try again'
                    });
                    document.querySelector('#btnclose-edit').click();
                });

            });

        });

        function bindModalbtn() {

            document.querySelector('#modalbtn').addEventListener('click', () => {
                Form.clear();
            });

        }

        function bindEditBtn() {

            document.querySelectorAll('.editBtn').forEach(btn => {

                btn.addEventListener('click', () => {

                    let data = btn.parentElement.parentElement.dataset.department;

                    Form.setEditData(JSON.parse(data));

                    $('#modal-edit').modal('show');

                });

            });

        }

        function buildTable() {

            table.refresh();

            table.listData("{{ csrf_token() }}").then(() => {
                onDeleteEvents();
                bindEditBtn();
            });

        }

        function onDeleteEvents() {

            document.querySelectorAll('.deleteBtn').forEach(btn => {

                btn.addEventListener('click', () => {

                    let department = btn.parentElement.parentElement.dataset.department;

                    department = JSON.parse(department);

                    Department.delete("{{ csrf_token() }}", department.id).then(res => {
                        toast(res.status, department, {
                            success: `${department.name} successfully deleted`,
                            error: 'Error while deleting. Please try again'
                        });
                    });

                    buildTable();

                });

            });

        }

        function toast(status, department, texts) {

            let color = (status == 'success') ? 'bg-success' : 'bg-danger';
            let title = (status = 'success') ? 'Success' : 'Error';
            let msg = (status == 'success')
            ? texts.success
            : texts.error;

            document.querySelector('#liveToast').classList.add(color);
            document.querySelector('.toast-title').innerHTML = title;
            document.querySelector('.toast-body').innerHTML = msg;

            $('#liveToast').toast('show');
        }

        function onEditEvents() {



        }

        function formDataJson(formData) {
            let json = {};
            formData.forEach((value, key) => {
                json[key] = value
            });
            return json;
        }

    </script>
@stop