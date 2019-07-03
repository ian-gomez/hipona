$(function() {
      $('body').on('click', '.editar', function(){
        var jornada_id = $(this).data("id");
        window.location.href = "jornadas"+'/'+jornada_id+'/edit';
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

      $('body').on('click', '.asistencias', function(){
        $('#nombrejornada').html('test');

        $('#modal_asistencias').modal('show');
        $('.cargando').hide();
        $('.caja_resultados').hide();

        var jornada_id = $(this).data("id");


        $('.btnbuscar').click(function(){
          $('.caja_resultados').hide();
          $(".cargando").show().delay( 2000 ).hide( 0 );
          setTimeout(function(){
            var dni = $('#dni_s').val();
            $.ajax({
              type: "GET", 
              url: 'asistencias/'+jornada_id+'/'+dni,
              cache: false,
              dataType: 'json',
              success: function(data){
                console.log(data);
                if(!data.error){
                  var datos = "Nombre: "+data.nombre+"\nApellido: "+data.apellido+"";
                  $("#resultados").text(datos);
                  $(".caja_resultados").show();
                }else{
                  $(".caja_resultados").hide();
                  $('.mensaje_error').html("<h3>Esta persona no está inscripta en la jornada</h3>");
                  $('#error_modal').modal('toggle');
                }
              }
            });
          },2100);
        })
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
