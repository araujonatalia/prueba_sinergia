
$(document).ready(function() {

    tablePacientes();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Buscar municipio al cescoger departamento
    $('#selectDepart').change(function() {
        let departamento =  $(this).find(":selected").val();
      
        $.get("/select-change/" + departamento, function (data) {
            var html = '';
            html += '<option value="" class="">Seleccione... </option>';
            $.each(data, function (delta, settings) {
               // console.log(settings);
                html += '<option value="'+ settings.id_municipio + '" class="">'+ settings.nombre + '</option></option>';
            });
            $('#fk_id_municipio').html(html);
        });  
    });

    $('body').on('click', '.js--btnreate--paciente', function (e) {
        e.preventDefault();

        const params = {
            'fK_id_tipdocumento': $('#fK_id_tipdocumento option:selected').val(),
            'num_documento': $('#num_documento').val(),
            'nombre1': $('#nombre1').val(),
            'nombre2': $('#nombre2').val(),
            'apellido1': $('#apellido1').val(),
            'apellido2': $('#apellido2').val(),
            'fK_id_genero': $('#fK_id_genero option:selected').val(),
            'fk_id_departamento': $('#selectDepart option:selected').val(),
            'fk_id_municipio': $('#fk_id_municipio option:selected').val(), 
          }

          $.ajax({
            url: '/prueba-createpaciente',
            dataType: 'JSON',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({params}),
            success: function (result, textStatus, jQxhr) {
                if (result.info == 200) {
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Se Guardo Correctamente.',
                        showConfirmButton: false,
                        timer: 5000
                    });
                    $('#fK_id_tipdocumento option:selected').val('');
                    $('#num_documento').val('');
                    $('#nombre1').val('');
                    $('#nombre2').val('');
                    $('#apellido1').val('');
                    $('#apellido2').val('');
                    $('#fK_id_genero option:selected').val('');
                    $('#selectDepart option:selected').val('');
                    $('#fk_id_municipio option:selected').val('');
                    //location.reload();
                    window.history.back();
                } else {
                    Swal.fire({
                        position: 'center',
                        type: 'error',
                        title: 'Ups!, ah ocurrido un error.',
                        showConfirmButton: true,
                        timer: 3500
                    });
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    $('body').on('click', '.js--btn--editPaciente', function (e) {
        e.preventDefault();
        let idpaciente = $(this).data('idpaciente');
        console.log(idpaciente);
       /* $.get("/paciente/" + idpaciente, function (data) {
            $('.form-data').append('<input type="hidden" class="id_paciente" value="' + data.id + '">');
            $('#name_segments').val(data.name_segments);
            $('.modal-title').text("Editar Segmento");
            $('.js--button--segment').remove();
            $('.modal-footer').append('<button type="button" class="btn btn-primary js--button--editsegment">Guardar cambios</button>');
            $('#ModalSegment').modal('show');
        });*/
    });


});

(function($){
$(document).on('click', '.js--btn--deletepaciente', function (event) {
    event.preventDefault();
   // let idempresa =$('.id-empresa').val();
    let idpaciente =  $(this).attr("data-paciente");
    console.log(idpaciente);

   /* $.ajax({
      url: '/api/pesv-deletevehicle',
      dataType: 'JSON',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify({ 'idvehicle': idvehicle, 'idempresa': idempresa }),
      success: function (data, textStatus, jQxhr) {
       // console.dir(data);
        if(data.info == 200) {
          Swal.fire({
              position: 'center',
              type: 'success',
              title: 'Se elimino Correctamente.',
              showConfirmButton: false,
              timer: 1000
          });
          location.reload();
        } else{
          Swal.fire({
            position: 'center',
            type: 'error',
            title: 'Ups!, ah ocurrido un error.',
            showConfirmButton: true,
            timer: 1500
          });
        }
      },
      error: function (jqXhr, textStatus, errorThrown) {
        console.log( errorThrown );
      }
    });*/
  });


})(jQuery);


/*$(document).on('click', '.btn--deletePaciente', function (event) {
//$('body').on('click', '.btn--deletePaciente', function (e) {
    e.preventDefault();
   /* alert('Esta seguro de que desea eliminar?');
    // let idtype = $(this).parent().parent().children().first().text();
    let idpaciente = $(this).attr("data-paciente");
   // let idpaciente = $(this).data('paciente');
    console.log(idpaciente);*/
/*alert('botno elimiad');
    let idpaciente = $(this).attr("data-paciente");
    let name = $(this).attr("data-name");
    console.log(idpaciente);
    console.log(name);
   /* Swal.fire({
        position: 'center',
        type: 'info',
        title: 'Esta seguro de que desea eliminar ' + name + '?',
        showConfirmButton: true,
        timer: 5000
    });
    $.ajax({
        url: '/api/paciente-delete',
        dataType: 'JSON',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({'idpaciente': idpaciente}),
        success: function (data, textStatus, jQxhr) {
            if (data.info == 200) {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Se elimino Correctamente.',
                    showConfirmButton: false,
                    timer: 2000
                });
              //  location.reload();
            } else {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'No ha sido eliminado',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        },
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    })*/








/*$('body').on('click', '.js--button--editsegment', function (e) {
    e.preventDefault();
    let idsegment = $('.id_segment').val();
    let name_segments = $('#name_segments').val();
    // $('.js--button--inspection').remove();
    $.ajax({
        url: '/api/pesv-editsegment',
        dataType: 'JSON',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({'idsegment': idsegment, 'name_segments': name_segments}),
        success: function (data, textStatus, jQxhr) {
            if (data.info == 200) {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Actualizado Correctamente.',
                    showConfirmButton: false,
                    timer: 1000
                });
               /* $('.id_segment').val('');
                $('#name_segments').val('');
                $('.js--button--editsegment').remove();
                $('#ModalSegment').modal('hide');
             //   location.reload();
            } else {
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: 'Ups!, ah ocurrido un error.',
                    showConfirmButton: true,
                    timer: 1500
                });
            }
        },
        error: function (jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
});*/



