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
        width: 10%;
        padding: 12px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f1f1f1;
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
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">P&aacute;gina principal</a></li>
            <li><a class="active" href="/personas/create">Inscripci&oacute;n</a></li>
            <li><a href="#">Desarrolladores</a></li>
        </ul>
    </nav>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
    @endif
    <form method="post" action="/personas">
        @csrf
        <label>Nombre(s): <br>
            <input name="nombre" type="text" placeholder="Ingrese su(s) nombre(s)" required>
        </label><br>

        <label>Apellido(s): <br>
            <input name="apellido" type="text" placeholder="Ingrese su(s) apellido(s)" required>
        </label><br>

        <label>DNI: <br>
            <input name="dni" type="text" placeholder="Ingrese su DNI" required>
        </label><br>

        <label>Correo electr&oacute;nico: <br>
            <input name="email" type="email" placeholder="Ingrese su direcci&oacute;n de correo electr&oacute;nico"
                required>
        </label><br>

        <label>Fecha de nacimiento: <br>
            <input name="fecha_nacimiento" type="date" required>
        </label><br>

        <label>Tel&eacute;fono: <br>
            <input name="telefono" type="text" placeholder="Ingrese su n&uacute;mero de tel&eacute;fono" required>
        </label><br>

        <label>Ciudad de procedencia: <br>
            <input name="ciudad_procedencia" type="text" placeholder="Ingrese su ciudad de procedencia" required>
        </label><br>

        <label>&Aacute;rea de conocimiento: <br>
            <input name="area_conocimiento" type="text" placeholder="Ingrese su &aacute;rea de conocimiento" required>
        </label><br>

        <label>Nivel en el que ejerce: <br>
            <input name="nivel_ejerce" type="text" placeholder="Ingrese el nivel en el cu&aacute;l ejerce"
                list="opciones" required>
            <datalist id="opciones">
                <option value="Inicial">
                <option value="Primario">
                <option value="Secundario">
                <option value="Terciario">
                <option value="Universitario">
            </datalist>
        </label><br>

        <label> Concurrir&aacute;s en condici&oacute;n de:
            <select name="categoria_id">
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                @endforeach
            </select>
        </label><br>

        <label>&iquest;Actualmente cursas o sos docente en el instituto Sedes Sapientiae y/o P&iacute;o XII?
            <select name="estudiante_actual" required>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </label><br>

        <input type="submit" name="submit">
    </form>
</body>

</html>