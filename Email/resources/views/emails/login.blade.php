<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <main>
        <div style="margin: 35px; margin: 0 auto; text-align: center">
            <img src="{{ $message->embed( public_path() . '/img/laravel.png' ) }}" alt="Laravel" width="100" height="100">
        </div>
        <div style="text-align: center">
            <hr style="margin-bottom: 35px;">
            <h4>Hi {{ $name }}, how is it going ?</h4>
            <p>You logged in our system</p>
            <small>{{ $datetime }}</small>
        </div>
    </main>
</body>
</html>