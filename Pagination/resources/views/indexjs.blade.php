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
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center" id="pagination">
                    <ul class="pagination">
                        <!-- <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>

        </div>

    </main>

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/classes/Fetch/Fetch.js') }}"></script>
    <script src="{{ asset('js/classes/Client/Client.js') }}"></script>
    <script src="{{ asset('js/classes/Table/Table.js') }}"></script>
    <script>
        let table = new Table('tbody');

        window.addEventListener('load', () => {

            buildTable();

        });

        function buildTable(page = 1) {

            table.refresh();

            table.paginateData("{{ csrf_token() }}", page);

        }
    </script>

</body>

</html>
