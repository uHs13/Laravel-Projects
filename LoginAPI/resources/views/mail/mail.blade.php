<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
</head>
<body>
    <main>
        <section>
            <div>
                <h4>Hi, please confirm the e-mail {{ $email }}</h4>
            </div>
            <div>
                <a href="{{ $link }}">Confirm</a>
            </div>
        </section>
    </main>
</body>
</html>