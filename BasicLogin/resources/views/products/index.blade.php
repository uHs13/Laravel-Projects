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
    <section>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="">
              <img src="{{ asset('img/icon.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
              Pizza!
            </a>
            @auth
            <form class="form-inline" method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" value="Hello {{ Auth::user()->name }}" readonly>
                </div>
                <button class="btn btn-transparent">
                    <i class="fas fa-power-off text-danger"></i>
                </button>
            </form>
            @endauth
        </nav>
    </section>
    <main class="container-fluid">
        <div class="d-flex align-items-center justify-content-center p-3">
            <div class="card shadow-sm" style="width: 18rem;">
                <img src="{{ asset('img/pizza.jpg') }}" class="card-img-top" alt="Pizza">
                <div class="card-body text-center">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the content.</p>
                  <a href="#" class="btn btn-danger">Go nowhere</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>