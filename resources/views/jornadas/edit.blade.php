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
    <b>Editar jornada</b>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('jornadas.update',$jornada->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="titulo">Título:</label>
          <input type="text" class="form-control" name="titulo" value="{{ $jornada->titulo }}"/>
        </div>
        <div class="form-group">
          <label for="ubicacion">Ubicación:</label>
          <input type="text" class="form-control" name="ubicacion" value="{{ $jornada->ubicacion }}"/>
        </div>
        <div class="form-group">
          <label for="fec_inicio">Fecha de inicio:</label>
          <input type="datetime-local" class="form-control" name="fecha_inicio" value="{{ Carbon\Carbon::parse($jornada->fecha_inicio)->format('Y-m-d\TH:i') }}"/>
        </div>
        <div class="form-group">
          <label for="fec_fin">Fecha de finalización:</label>
          <input type="datetime-local" class="form-control" name="fecha_fin" value="{{ Carbon\Carbon::parse($jornada->fecha_fin)->format('Y-m-d\TH:i') }}"/>
        </div>
        <center><button type="submit" class="btn btn-primary">Guardar</button></center>
      </form>
  </div>
</div>
@endsection
