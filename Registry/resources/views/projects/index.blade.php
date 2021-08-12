@extends('layouts.app')

@section('body')

    <div class="col-10 offset-1">

        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Projects</li>
            </ol>
        </div>

        <div class="card">

            <div class="card-header">
                <i class="fas fa-project-diagram text-info"></i> Projects
            </div>

            <div class="card-body table-responsive">
                @foreach ($projects as $project)
                    <div class="accordion m-2" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="heading{{ $project->name }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $project->name }}" aria-expanded="true"
                                        aria-controls="collapse{{ $project->name }}">
                                        {{ $project->name }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{ $project->name }}" class="collapse"
                                aria-labelledby="heading{{ $project->name }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card">
                                        <h5 class="card-header"><i class="fas fa-code text-danger"></i> 
                                            Developers</h5>
                                        <div class="card-body">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($project->developers as $developer)
                                                        <tr>
                                                            <td>{{ $developer->id }}</td>
                                                            <td>{{ $developer->name }}</td>
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
                {{ $projects->links() }}
            </div>
        </div>

    </div>

@stop
