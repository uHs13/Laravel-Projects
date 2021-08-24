<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pagination</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <main class="container-fluid">

        <div class="col-lg-12 display-flex align-items-center justify-content-center p-5">

            <div class="card shadow">
                <div class="card-header">
                    <i class="fas fa-user-friends fas-3x text-primary"></i>
                    Clients
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th>{{ $client->id }}</th>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="card-text">
                        <small class="text-muted">
                           Displaying {{ $clients->count() }} of {{ $clients->total() }}
                            - {{ $clients->firstItem() }} to {{ $clients->lastItem() }}
                        </small>
                    </p>
                </div>
                <div class="card-footer text-center">
                    {{ $clients->links() }}
                </div>
            </div>

        </div>

    </main>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">
</body>

</html>
