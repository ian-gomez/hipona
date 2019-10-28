<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripci&oacute;n</title>
    <style>
    input {
        padding: 8px;
        display: block;
        width: 100%
    }
    </style>
</head>

<body>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="/personas">
        @csrf
        <label>Nombre(s):
            <input name="nombre" type="text" placeholder="Ingrese su(s) nombre(s)" required>
        </label>

        <label>Apellido(s):
            <input name="apellido" type="text" placeholder="Ingrese su(s) apellido(s)" required>
        </label>

        <label>DNI:
            <input name="dni" type="text" placeholder="Insgrese su DNI" required>
        </label>

        <label>Correo electr&oacute;nico:
            <input name="email" type="email" placeholder="Ingrese su direcci&oacute;n de correo electr&oacute;nico"
                required>
        </label>

        <label>Fecha de nacimiento:
            <input name="fecha_nacimiento" type="date" placeholder="Ingrese su fecha de nacimiento">
        </label>

        <label>Tel&eacute;fono:
            <input name="telefono" type="text" placeholder="Ingrese su n&uacute;mero de tel&eacute;fono" required>
        </label>

        <label>Ciudad de procedencia:
            <input name="ciudad_procedencia" type="text" placeholder="Ingrese su ciudad de procedencia" required>
        </label>

        <label>&Aacute;rea de conocimiento:
            <input name="area_conocimiento" type="text" placeholder="Ingrese su &aacute;rea de conocimiento" required>
        </label>

        <label>Nivel en el que ejerce:
            <input name="nivel_ejerce" type="text" placeholder="Ingrese el nivel en el cu&aacute;l ejerce"
                list="opciones" required>
            <datalist id="opciones">
                <option value="Inicial">
                <option value="Primario">
                <option value="Secundario">
                <option value="Terciario">
                <option value="Universitario">
            </datalist>
        </label>

        <label> Concurrir&aacute;s en condici&oacute;n de:
            <select name="categoria_id">
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                @endforeach
            </select>
        </label>

        <label>&iquest;Actualmente cursas o sos docente en el instituto Sedes Sapientiae y/o P&iacute;o XII?
            <select name="estudiante_actual" required>
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </label>

        <input type="submit" name="submit">
    </form>
</body>

</html>