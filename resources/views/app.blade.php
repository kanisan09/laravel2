<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>larablog</title>
</head>
<body>
    <div class="container">
        <h1>Laravel初心者ブログ</h1>

        @yield('content')

        <div>
            <a href="{{url('./dashboard')}}">dashboard</a>
        </div>
    </div>
</body>
</html>