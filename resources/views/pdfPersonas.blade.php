<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Listado de personas</title>
    <link rel="stylesheet" type="text/css" href="css/tablaPdf.css">
</head>

<body>
    <table class="tabla-impresion" id="tablaUsuarios">
        <thead>
            <tr class="info">
                <th class="text-left">Dni</th>
                <th class="text-left">Apellido</th>
                <th class="text-left">Nombre</th>
                <th class="text-center">Email</th>
                <th class="text-center">Nacimiento</th>
                <th class="text-center">Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $Personas)
            <tr>
                <td class="text-left">{{ $Personas->dni }}</td>
                <td class="text-left">{{ $Personas->apellido }}</td>
                <td class="text-left">{{ $Personas->nombre }}</td>
                <td class="text-center">{{ $Personas->email }}</td>
                <td class="text-center">{{ $Personas->edad }}</td>
                <td class="text-center">{{ $Personas->telefono }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>