<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripci&oacute;n</title>
    <style>
    body {
        background-color: #c8d9ff;
    }

    input {
        width: 50%;
        padding: 12px 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 50%;
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
        width: 50%;
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
            <li><a class="active" href="/personas/create">Inscripci&oacute;n</a></li>
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
        @if(session()->has('message'))
        {{ session()->get('message') }}
        @endif

        @if ($errors->any())
        <p>Se han encontrado los siguientes errores en su intento de registro:</p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="/personas">
            @csrf
            <label for="nombre">Nombre(s):</label><br>
            <input id="nombre" name="nombre" type="text" required autofocus><br>

            <label for="apellido">Apellido(s):</label><br>
            <input id="apellido" name="apellido" type="text" required><br>

            <label for="dni">DNI:</label><br>
            <input id="dni" name="dni" type="text" required><br>

            <label for="email">Correo electr&oacute;nico:</label><br>
            <input id="email" name="email" type="email" required><br>

            <label for="fecha_nacimiento">Fecha de nacimiento:</label><br>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" required><br>

            <label for="telefono">Tel&eacute;fono:</label><br>
            <input id="telefono" name="telefono" type="text" required><br>

            <label for="ciudad_procedencia">Ciudad de procedencia:</label><br>
            <input id="ciudad_procedencia" name="ciudad_procedencia" type="text" required><br>

            <label for="area_conocimiento">&Aacute;rea de conocimiento:</label><br>
            <input id="area_conocimiento" name="area_conocimiento" type="text" required><br>

            <label for="nivel_ejerce">Nivel en el que ejerce:</label><br>
            <input id="nivel_ejerce" name="nivel_ejerce" type="text" list="opciones" required>
            <datalist id="opciones">
                <option value="Inicial">
                <option value="Primario">
                <option value="Secundario">
                <option value="Terciario">
                <option value="Universitario">
            </datalist><br>

            <label for="categoria_id">Concurrir&aacute;s en condici&oacute;n de:</label><br>
            <select id="categoria_id" name="categoria_id">
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                @endforeach
            </select><br>

            <label for="estudiante_actual">&iquest;Actualmente cursas o sos docente en el instituto Sedes Sapientiae y/o
                P&iacute;o XII?</label><br>
            <select id="estudiante_actual" name="estudiante_actual" required>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select><br>

            <input type="submit" name="submit">
        </form>
    </main>
</body>

</html>