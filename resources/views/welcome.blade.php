<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sedes Sapientiae Jornada</title>

    <style>
    body {
        background-color: #c8d9ff;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #8896d8;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #6685c7;
    }

    .active {
        background-color: #4f4cb4;
    }

    .login {
        float: right;
    }
    </style>
</head>

<body>
    <ul>
        <li><a class="active" href="/">P&aacute;gina principal</a></li>
        <li><a href="/personas/create">Inscripci&oacute;n</a></li>
        <li><a href="#">Desarrolladores</a></li>
        @if (Route::has('login'))
            @if (Auth::check())
            <li class="login"><a href="{{ url('/home') }}">Home</a></li>
            @else
            <li class="login"><a href="{{ url('/login') }}">Login</a></li>
            <li class="login"><a href="{{ url('/register') }}">Register</a></li>
            @endif
        @endif
    </ul>
</body>

</html>