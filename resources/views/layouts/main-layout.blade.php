<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('mainPage') }}">Веб-приложение</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('mainPage') }}">Главная</a>
                        </li>
                    </ul>
                    <a href="{{ route('loginPage') }}">
                        <button class="btn btn-outline-success" type="submit">Вход</button>
                    </a>
                    <a href="{{ route('registrationPage') }}">
                        <button type="button" class="btn btn-outline-danger mx-4">Регистрация</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div>@yield('content')</div>
</body>

</html>