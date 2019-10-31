<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrolladores</title>
    <style>
    body {
        background-color: #c8d9ff;
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

    .active {
        background-color: #4f4cb4;
    }

    .login {
        float: right;
    }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">P&aacute;gina principal</a></li>
            <li><a href="/personas/create">Inscripci&oacute;n</a></li>
            <li><a class="active" href="/desarrolladores">Desarrolladores</a></li>
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
    <p>Esta p&aacute;gina ha sido desarrollada por los alumnos de tercer a&ntilde;o de la carrera de "Tecnicatura
        Superior en An&aacute;lisis y Desarrollo de Software" para la c&aacute;tedra de Programaci&oacute;n III dada por
        el profesor Javier Parra.</p>
    <p>Desarrolladores en el ciclo lectivo 2018:</p>
    <ul>
        <li>Arrejor&iacute;a, Axel</li>
        <li>Mart&iacute;nez, Juan</li>
        <li>Turt&uacute;, Jonatan</li>
    </ul>
    <p>Desarrolladores en el ciclo lectivo 2019:</p>
    <ul>
        <li>G&oacute;mez, Iaz Ezequiel</li>
        <li>Litvack, Samuel</li>
        <li>Rey, Bruno</li>
    </ul>
</body>

</html>