@extends('layouts.app')

@section('content')
<title>Modificar usuario</title>

<form action="{{route('Listado.update', $Personas->id)}}" method="post" id="form1" class="form">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="_method" value="PUT">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellidos"
                            value="{{ $Personas->apellido }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres"
                            value="{{ $Personas->nombre }}" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-address-card"></i></span>
                        <input type="text" class="form-control" name="dni" id="dni" placeholder="Dni"
                            value="{{ $Personas->dni }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Correo electronico" value="{{ $Personas->email }}" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                        <input type="date" class="form-control" name="edad" id="edad" placeholder="Edad"
                            value="{{ $Personas->edad }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-phone-square"></i></span>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono"
                            value="{{ $Personas->telefono }}" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-globe-americas"></i></span>
                        <input type="text" name="ciudadProcedencia" id="ciudadProcedencia"
                            placeholder="Ciudad de procedencia" class="form-control"
                            value="{{ $Personas->ciudadProcedencia }}" required>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-university"></i></span>
                        <input type="text" name="areaConocimiento" id="areaConocimiento"
                            placeholder="Area de conocimiento" class="form-control"
                            value="{{ $Personas->areaConocimiento }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-8">
                <b>
                    <p>Nivel/es en el/los que ejerces:</p>
                </b>
                <div>
                    @if (($Personas->nivelEjerce) == 'Inicial')
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Inicial" checked="checked" />
                    <label>Inicial</label>
                    @else
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Inicial" />
                    <label>Inicial</label>
                    @endif

                    @if (($Personas->nivelEjerce) == 'Primario')
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Primario" checked="checked" />
                    <label>Primario</label>
                    @else
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Primario" />
                    <label>Primario</label>
                    @endif

                    @if (($Personas->nivelEjerce) == 'Secundario')
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Secundario" id="secundario"
                        checked="checked" />
                    <label>Secundario</label>
                    @else
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Secundario" id="secundario" />
                    <label>Secundario</label>
                    @endif

                    @if (($Personas->nivelEjerce) == 'Terciario')
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Terciario" checked="checked" />
                    <label>Terciario</label>
                    @else
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Terciario" />
                    <label>Terciario</label>
                    @endif

                    @if (($Personas->nivelEjerce) == 'Universitario')
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Universitario" checked="checked" />
                    <label>Universitario</label>
                    @else
                    <input type="radio" name="nivelEjerce" id="nivelEjerce" value="Universitario" />
                    <label>Universitario</label>
                    @endif

                    <!--@if (($Personas->nivelEjerce) != 'Inicial' && ($Personas->nivelEjerce) != 'Primario' && ($Personas->nivelEjerce) != 'Secundario' && ($Personas->nivelEjerce) != 'Terciario' && ($Personas->nivelEjerce) != 'Universitario')
					<input type="radio" id="idradio" name="optradio" value="otro" checked="checked">
					<label >Otro</label>
					<input type="text" name="otro" id="campoOtro" value="{{ $Personas->nivelEjerce }}">
					@else
					<input type="radio" id="idradio" name="optradio" value="otro" >
					<label >Otro</label>
					<input type="hidden" name="otro" id="campoOtro" >
					@endif -->

                    <hr class="style1">
                    <b>Concurriras en condicion de:</b>
                    {{Form::select('categoria_id', $cat, $Personas->categoria_id)}}
                </div>

                <hr class="style1">
                <b>Sos actualmente estudiante del Sedes/ docente del Sedes o Pío XII?</b>
                <select data-style="btn-light" name="estudianteActual" required>
                    @if (($Personas->estudianteActual) == 'Si')
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                    @else
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                    @endif
                </select>

                <hr class="style1">
                <button type="submit" id="sub" name="nsubmit" class="btn btn-success">Modificar</button>
                <input type="button" onclick="history.back()" class="btn btn-primary" name="Volver" value="Volver">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    </div>
</form>
@endsection