@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Developers</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-code text-danger"></i> Developers
            </div>

            <div class="card-body table-responsive">
                @foreach ($developers as $developer)
                    <div class="accordion m-2" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="heading{{ $developer->name }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $developer->name }}" aria-expanded="true"
                                        aria-controls="collapse{{ $developer->name }}">
                                        {{ $developer->name }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{ $developer->name }}" class="collapse"
                                aria-labelledby="heading{{ $developer->name }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card">
                                        <h5 class="card-header"><i class="fas fa-project-diagram text-info"></i>
                                            Projects</h5>
                                        <div class="card-body">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($developer->projects as $project)
                                                        <tr>
                                                            <td>{{ $project->id }}</td>
                                                            <td>{{ $project->name }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $developers->links() }}
            </div>
        </div>

    </div>

@stop
