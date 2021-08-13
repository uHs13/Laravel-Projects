<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='csrf-token' content={{ csrf_token() }}>
    <title>Users</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/user.png') }}" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

</head>

<body style="font-family: 'Montserrat'">

    @component('components.navbar')
    @endcomponent

    <main class='container-fluid'>

        @hasSection('body')
            @yield('body')
        @endif

    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
