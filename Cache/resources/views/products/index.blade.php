<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <main class="container-fluid">
        <div class="jumbotron m-5 shadow">
            <h1 class="display-6 text-center mb-4">Products List</h1>
            <div class="lead table-responsive">
                @foreach ($products as $product)
                    <div class="accordion m-2" id="accordionExample">
                        <div class="card bg-dark">
                            <div class="card-header" id="heading{{ $product->id }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-light" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $product->id }}" aria-expanded="true"
                                        aria-controls="collapse{{ $product->id }}">
                                        {{ $product->name }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{ $product->id }}" class="collapse"
                                aria-labelledby="heading{{ $product->id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card bg-secondary">
                                        <h5 class="card-header text-light"><i class="fas fa-project-diagram text-info"></i>
                                            Categories</h5>
                                        <div class="card-body">
                                            @if (count($product->categories) > 0)
                                                <table class="table table-dark">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($product->categories as $category)
                                                            <tr>
                                                                <td>{{ $category->id }}</td>
                                                                <td>{{ $category->name }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            @else
                                                ---
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr class="my-4">
            <div>
                {{ $products->links() }}
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
