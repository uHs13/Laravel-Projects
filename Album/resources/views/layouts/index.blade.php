<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Album</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/camera.png') }}" type="image/x-icon">

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body style="min-width: 960px;">
    <main class="container-fluid">

        @component('components.navbar')
        @endcomponent

        <section>
            @hasSection('body')
                @yield('body')
            @endif
        </section>

    </main>

    <!-- Js -->
    <script src="{{ asset('js/app.js') }}"></script>
    @hasSection('javascript')
        @yield('javascript')
    @endif
</body>

</html>
