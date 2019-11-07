@extends('layouts.template')

@section('title', 'Inscripción')

@section('content')

<center>
    <h1>Inscripci&oacute;n</h1>
</center>

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

@endsection