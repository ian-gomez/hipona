<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title')</title>

    <style>
    body {
        background-color: #c8d9ff;
    }

    input {
        width: 30%;
        padding: 12px 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 30%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    select {
        width: 30%;
        padding: 12px 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #8896d8;
    }

    nav li {
        float: left;
    }

    nav li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    nav li a:hover {
        background-color: #6685c7;
    }

    .login {
        float: right;
    }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/personas/create">Inscripci&oacute;n</a></li>
            <li><a href="/desarrolladores">Desarrolladores</a></li>
            <li><a href="http://www.sedessapientiae.edu.ar/index-2.htm">Instituto Sedes Sapientiae</a></li>
            @if (Route::has('login'))
            @if (Auth::check())
            <li class="login"><a href="{{ url('/home') }}">Home</a></li>
            @else
            <li class="login"><a href="{{ url('/login') }}">Login</a></li>
            <li class="login"><a href="{{ url('/register') }}">Register</a></li>
            @endif
            @endif
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>