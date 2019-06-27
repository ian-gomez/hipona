<html>
<head>
  <title>Administrar jornadas</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
  <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
    </div><br />
  @endif
  <div class="acciones_menu">
     <a href="{{ url('/home') }}" class="btn btn-danger">Volver</a>
     <a href="{{ url('/jornadas/create') }}" class="btn btn-success">Crear jornada</a><br><br>
  </div>

  <table id="table" class="table table-responsive table-hover">
    <thead style="background-color: #e3ebff;">
        <tr>
          <td>Título</td>
          <td>Acción</td>
        </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <div class="modal fade" id="modal_config" tabindex="-1" role="dialog" aria-labelledby="titulo_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×   </span><span class="sr-only">Cerrar</span>
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
        <h5 class="modal-title">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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

<div>
<script>
  $(function() {
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
          ajax: '{{ route('jornadas.index') }}',
          columns: [
            { data: 'titulo', name: 'titulo' },
            { data: 'accion', name:' accion'}
          ]
      });

      $('body').on('click', '.editar', function(){
        var jornada_id = $(this).data("id");
        window.location.href = "{{ route('jornadas.index') }}"+'/'+jornada_id+'/edit';
      });

      $('body').on('click', '.eliminar', function(){
        $('#modal_confirm').modal('show');
        var jornada_id = $(this).data("id");
        $('body').on('click', '.btneliminar', function(){
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "jornadas/"+jornada_id,
            data:   {
              "jornada_id": jornada_id,
              "_method": 'DELETE',
            },
            success: function () { 
              alert("Jornada eliminada correctamente");
              location.reload();
            }
          });
        })
      });

      $('body').on('click', '.config', function(){
        var jornada_id = $(this).data("id");
        $.ajax({
          type: "GET", 
          url: 'configjornada/'+jornada_id,
          dataType: 'json',
          success: function(data){
            $('#id_jornada').val(jornada_id);
            $('#cantidad_asistencias').val(data[0].cantidad_asistencias);
            $('#tolerancia').val(data[0].tolerancia);
            $('#modal_config').modal('show');
          }
        });
      });

      $('body').on('click', '.btnguardar', function(){
        if($('#cantidad_asistencias').val() != '' && $('#tolerancia').val() != ''){
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST", 
            url: 'configjornada/guardar',
            data: "jornada_id="+ $('#id_jornada').val()+"&cantidad_asistencias="+$('#cantidad_asistencias').val()+"&tolerancia="+$('#tolerancia').val(),
            success: function(){
              $('#modal_config').modal('hide');
            }
          })
        }else{
          alert("Complete los campos");
        }
      })
  });
</script>
</div>
</div>
</body>
</html>
