<html>

<head>
    <title>Administrar jornadas</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
</head>

<style>
.uper {
    margin-top: 40px;
}
</style>

<body>
    <div class="uper">
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br>
        @endif

        <div class="acciones_menu">
            <a href="{{ url('/home') }}" class="btn btn-danger">Volver</a>
            <a href="{{ url('/jornadas/create') }}" class="btn btn-success">Crear jornada</a><br><br>
        </div>

        <table id="table" class="table table-responsive table-hover">
            <thead style="background-color: #e3ebff;">
                <tr>
                    <td>Título</td>
                    <td>Inicia</td>
                    <td>Finaliza</td>
                    <td>Acción</td>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>

        <div class="modal fade" id="modal_config" tabindex="-1" role="dialog" aria-labelledby="titulo_modal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true" class="">X</span>
                            <span class="sr-only">Cerrar</span>
                        </button>

                        <h4 class="modal-title" id="titulo_modal">Configuración de la jornada</h4>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id_jornada" id="id_jornada">
                        <label for="cantidad_asistencias">Asistencias requeridas</label><br>
                        <input class="form-control" id="cantidad_asistencias" name="cantidad_asistencias"><br>
                        <label for="tolerancia">Tolerancia</label><br>
                        <input class="form-control" id="tolerancia" name="tolerancia">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success btnguardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modal_confirm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×
                            </span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="titulo_modal">Confirmación</h4>
                    </div>

                    <div class="modal-body">
                        <p>Desea eliminar esta jornada?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btneliminar">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modal_asistencias" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true" class="">X</span>
                            <span class="sr-only">Cerrar</span>
                        </button>
                        <h4 class="modal-title" id="titulo_modal">Consultar <label id="nombrejornada"></label></h4>
                    </div>

                    <div class="modal-body">
                        <div class="input-group add-on">
                            <input class="form-control" placeholder="Buscar..." name="dni_s" id="dni_s" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default btnbuscar" type="submit"><i
                                        class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>

                        <div class="cargando">
                            <center><img style="margin-top: 0.5cm;" src="img/ajax-loader.gif"></center>
                        </div>

                        <div class="caja_resultados">
                            <textarea id="resultados" name="resultados" style="margin-top: 0.5cm;" class="form-control"
                                rows="5" readonly="true"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="error_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true" class="">X</span>
                            <span class="sr-only">Cerrar</span>
                        </button>
                        <h4 class="modal-title" id="titulo_modal">ERROR</h4>
                    </div>

                    <div class="modal-body">
                        <div class="mensaje_error"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            language: {
                "search": "Buscar",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "zeroRecords": "No hay resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            ajax: '{{ url('jornadas') }}',
            columns: [{
                    data: 'titulo',
                    name: 'titulo'
                },
                {
                    data: 'fecha_inicio',
                    name: 'fecha_inicio'
                },
                {
                    data: 'fecha_fin',
                    name: 'fecha_fin'
                },
                {
                    data: 'accion',
                    name: ' accion'
                }
            ]
        });
        </script>
    </div>
</body>

</html>