<!doctype html>
<html>

<head>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="js\jquery.js" type="text/javascript"> </script>
    <link rel=StyleSheet href="css\bootstrap.css" type="text/css" media="screen">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js\fontawesome-all.js"></script>
    <title>Formulario de inscripción</title>
</head>

<body background="img/fondo2.jpg">
    @if(Session::has('mensaje_dni'))
    <div class='alert alert-danger'>
        <p><strong>{!! Session::get('mensaje') !!}</strong></p>
    </div>
    @endif

    @if(Session::has('mensaje_correo'))
    <div class='alert alert-danger'>
        <p><strong>{!! Session::get('mensaje_correo') !!}</strong></p>
    </div>
    @endif

    @if(Session::has('mensaje_edad'))
    <div class='alert alert-danger'>
        <p><strong>{!! Session::get('mensaje_edad') !!}</strong></p>
    </div>
    @endif

    <form action="{{url('/inserta')}}" method="post" id="form1" class="form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="text-align: center; background-color:#3B579D;">
                    <a href="http://www.sedessapientiae.edu.ar/index-2.htm">
                        <img class="imagen" src="img/cabecera1.png">
                    </a>
                </div>
            </div> <br>

            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                <input type="text" id="apellido" name="apellido" class="form-control"
                                    placeholder="Apellidos" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-address-card"></i></span>
                                <input type="text" class="form-control" name="dni" id="dni" placeholder="Dni" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Correo electronico" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group input-append date" id="">
                                <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                                <input type="date" class="form-control" name="edad" placeholder="Fecha de nacimiento" />
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-phone-square"></i></span>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    placeholder="Telefono" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-globe-americas"></i></span>
                                <input type="text" name="ciudadP" id="ciudadP" placeholder="Ciudad de procedencia"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-university"></i></span>
                                <input type="text" name="areaCon" id="areaCon" placeholder="Area de conocimiento"
                                    class="form-control " required>
                            </div>
                        </div>
                    </div>

                    <b>
                        <p>Nivel/es en el/los que ejerces:</p>
                    </b>

                    <div>
                        <input type="radio" name="optradio" value="Inicial" />
                        <label>Inicial</label>
                        <input type="radio" name="optradio" value="Primario" />
                        <label>Primario</label>
                        <input type="radio" name="optradio" value="Secundario" />
                        <label>Secundario</label>
                        <input type="radio" name="optradio" value="Terciario" />
                        <label>Terciario</label>
                        <input type="radio" name="optradio" value="Universitario" />
                        <label>Universitario</label>
                        <input type="radio" id="idradio" name="optradio" value="otro">
                        <label>Otro</label>
                        <input type="hidden" name="otro" id="campoOtro">
                    </div>
                    <hr class="style1">
                    <b>Concurriras en condicion de:</b>
                    {{Form::select('categorias',$cat)}}
                    <hr class="style1">
                    <b>Sos actualmente estudiante del Sedes/ docente del Sedes o Pío XII?</b>
                    <select data-style="btn-light" name="estudianteActual" required>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <hr class="style1">
                    <button type="submit" id="sub" name="nsubmit" class="btn btn-primary">Registrar</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
            <div class="tiny-footer">
                <p>© 2018 sedessapientiae.com.ar Todos los derechos reservados | <a href="#" data-toggle="modal"
                        data-target="#myModal">Desarrolladores</a></p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog" data-backdrop="false">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">Desarrollado por los alumnos:
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>

                        <div class="modal-body">
                            <p>- Arrejoría Axel</p>
                            <p>- Martinez Juan</p>
                            <p>- Turtú Jonatan</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $("input[name='optradio']").click(function() {
        if ($("#idradio").is(':checked')) {
            $('#campoOtro').attr('type', 'text');
        } else {
            $('#campoOtro').attr('type', 'hidden');
        }
    });
    </script>
</body>

</html>