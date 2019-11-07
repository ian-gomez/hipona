@extends('layouts.estilos')

@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>

<a style="margin-top: 40px;" href="{{ url()->previous() }}" class="btn btn-danger">Volver</a>

<div class="card uper">
    <div class="card-header">
        <center>
            <h2><b>Asistencias - Jornada "{{ $jornada->titulo }}"</b></h2>
        </center>
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br>
        @endif
    </div>
    <center>
        <div style="width: 15cm;">
            <div class="form-group">
                <label style="font-size: 20px" for="dni">Buscar persona</label>
                <input placeholder="Número de documento" class="form-control" name="dni" id="dni"><br>
                <input type="hidden" name="jornada_id" id="jornada_id" value="{{ $jornada->id }}">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <center><button class="btn btn-info" id="buscar" type="submit">Buscar</button></center>
            </div>
        </div>
        <div class="resultados" style="display:none">
            <h3>Datos de la persona: </h3><br>
            Nombre: <label id="nombre_persona"></label><br>
            Apellido: <label id="apellido_persona"></label><br>
            Ciudad: <label id="ciudad_persona"></label><br>
            <label id="mensaje_asistencia"></label>
        </div>
        <div class="resultados_error" style="display:none">
            <label id="mensaje_error"></label>
        </div>
    </center>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script>
    $('#dni').on('click focusin', function() {
        this.value = '';
    });
    $('#buscar').click(function() {
        var dni = $('#dni').val();
        var jornada_id = $('#jornada_id').val();
        var token = $('#token').val();
        console.log(dni);
        $.ajax({
            type: "GET",
            url: '/asistencias/' + jornada_id + '/' + dni,
            dataType: 'json',
            success: function(data) {
                if (!data.error) {
                    $('.resultados_error').css('display', 'none');
                    $('#nombre_persona').text(data.nombre);
                    $('#apellido_persona').text(data.apellido);
                    $('#ciudad_persona').text(data.ciudad_procedencia);
                    $('.resultados').css('display', 'block');

                    $.ajax({
                        type: "post",
                        url: "/asistencias/cargar",
                        data: '_token=' + token + '&persona_dni=' + dni + '&jornada_id=' +
                            jornada_id,
                        success: function(data2) {
                            if (data2.error) {
                                $('#mensaje_asistencia').html('<h3>' + data2.mensaje +
                                    '</h3>');
                            } else {
                                $('#mensaje_asistencia').html(
                                    '<h3>Asistencia cargada correctamente!</h3>');
                            }
                        }
                    });
                } else {
                    $('.resultados').css('display', 'none');
                    $('#mensaje_error').html(
                        '<h3>Esta persona no està inscripta en la jornada.</h3>');
                    $('.resultados_error').css('display', 'block');
                }
            }
        });
    });
    </script>
</div>
@endsection