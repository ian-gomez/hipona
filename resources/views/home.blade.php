@extends('layouts.app')
@section('content')
@if(Session::has('mensaje_edad'))
<div class='alert alert-danger'> 
    <p><strong>{!! Session::get('mensaje_edad') !!}</strong></p>         
</div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="panel-heading"></div>   

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}

                    </div>
                    @endif

                    <!--Modal agregar--> 
                    <div style="text-align: right;">
                        <form action="{{url('/exportarPdf')}}" method="get" id="form_pdf">
                            <button>Generar PDF</button>
                        </form>
                    </div>
                    <button style="font-size: 13px;" class="btn btn-primary" data-toggle="modal" data-target="#ventanaAgregar">Agregar</button>
                    <div class="modal fade" id="ventanaAgregar" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close"  data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                    <h4 class="modal-title">REGISTRAR NUEVO USUARIO</h4>
                                </div>
                                <div class="modal-body">
                                    <form   action="{{url('/inserta')}}"  method="post" id="form1" class="form">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                            <input type="text" id="apellido" name="apellido" class="form-control"  placeholder="Apellidos" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres" required>
                                        </div>
                                        <br>                                        
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-address-card"></i></span>
                                            <input type="text" class="form-control" name="dni" id="dni" placeholder="Dni" required>
                                        </div>                                      
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Correo electronico" required>
                                        </div>
                                        <br>                                        
                                        <div class="input-group input-append date" id="">                                               
                                            <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                                            <input type="date" class="form-control" name="edad" placeholder="Fecha de nacimiento" />
                                        </div>
                                        <br>                                        
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-phone-square"></i></span>
                                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-globe-americas"></i></span>
                                            <input type="text" name="ciudadP" id="ciudadP" placeholder="Ciudad de procedencia" class="form-control" required>
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                            <input type="text" name="areaCon" id="areaCon" placeholder="Area de conocimiento" class="form-control " required>
                                        </div>
                                        <br>
                                        <b><p>Nivel/es en el/los que ejerces:</p></b>
                                        <div>                                           
                                            <input type="radio" name="optradio" value="Inicial" />
                                            <label>Inicial</label> 
                                            <input type="radio" name="optradio" value="Primario"/> 
                                            <label>Primario</label>
                                            <input type="radio" name="optradio" value="Secundario" /> 
                                            <label>Secundario</label>
                                            <input type="radio" name="optradio" value="Terciario" />
                                            <label>Terciario</label>
                                            <input type="radio" name="optradio" value="Universitario" />
                                            <label >Universitario</label>
                                            <input type="radio" id="idradio" name="optradio" value="otro">
                                            <label >Otro</label>
                                            <input type="hidden" name="otro" id="campoOtro">
                                        </div>
                                        <hr class="style1">
                                        <b>Concurriras en condicion de:</b>
                                        {{Form::select('categorias',$cat)}}
                                        <hr class="style1">
                                        <b>Sos actualmente estudiante del Sedes/ docente del Sedes o Pío XII?</b>
                                        <select data-style="btn-primary"  name="estudianteActual" required>
                                            <option value="1">Si</option> 
                                            <option value="0">No</option>
                                        </select>
                                        <hr class="style1">
                                        <button type= "submit" id="sub" name="nsubmit" class="btn btn-primary">Registrar</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Listado de usuarios registrados -->
                    <table class="table table-responsive table-hover" id="tablaUsuarios">     
                        <thead>
                            <tr class="info">
                                <th>Dni</th> 
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Teléfono</th> 
                                <th>Código</th> 
                                <th>Modificar</th>
                                <th>Eliminar</th> 
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($per as $Personas)
                            <tr> 
                                <td>{{ $Personas->dni }}</td>
                                <td>{{ $Personas->nombre }}</td>
                                <td>{{ $Personas->apellido }}</td>
                                <td>{{ $Personas->email }}</td>
                                <td>{{ $Personas->edad }}</td>
                                <td>{{ $Personas->telefono }}</td>
                                <td> <img src="data:image/png;base64,{{DNS1D::getBarcodePNG(".$Personas->dni.", 'C39')}}" alt="barcode" /> </td>
                                <td>                                   
                                    {{ Form::open(['route' => ['Listado.edit', $Personas->id], 'method' => 'get']) }} 
                                    <button  type="submit" name="modificar" style="font-size: 13px; background: transparent;" class=" btn btn-outline"> <i class="fas fa-edit"></i></button>
                                    {{ Form::close() }}
                                </td>
                                <td>
                                    {{ Form::open(['route' => ['Listado.destroy', $Personas->id], 'method' => 'delete']) }} 
                                    <button type="submit" name="eliminar" style="font-size: 13px; background: transparent;" class=" btn btn-outline"  onclick="alerta();" > <i class="fas fa-trash-alt"></i> </button>
                                    {{ Form::close() }}
                                </td>   
                            </tr>
                            @endforeach 
                        </tbody>          
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
