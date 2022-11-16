$(document).ready(function() {
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
                html += '<option value="'+ settings.id_municipio + '" class="">'+ settings.nombre + '</option></option>';
            });
            $('#fk_id_municipio').html(html);
        });  
    });

    $('body').on('click', '.js--btncreate--paciente', function (e) {
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

        if (params.nombre1 == ''){
            alert('Ingrese primer nombre');
            $('#nombre1').focus();
            return false;
        }
        if (params.apellido1 == ''){
            alert('Ingrese apellido');
            $('#apellido1').focus();
            return false;
        }
        if (params.fK_id_tipdocumento == ''){
            alert('Debe selecionar tipo de documento');
            $('#fK_id_tipdocumento').focus();
            return false;
        }
        if (params.num_documento == ''){
            alert('Debe ingresar numero documento');
            $('#num_documento').focus();
            return false;
        } 
       
        if (params.fK_id_genero == ''){
            alert('Seleccione genero ');
            $('#fK_id_genero').focus();
            return false;
        }
        if (params.selectDepart == ''){
            alert('Seleccione Departamento');
            $('#selectDepart').focus();
            return false;
        }
        if (params.fk_id_municipio == ''){
            alert('Seleccione Municipio');
            $('#fk_id_municipio').focus();
            return false;
        }
        $.ajax({
            url: '/prueba-createpaciente/',
            dataType: 'JSON',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({params}),
            success: function (result, textStatus, jQxhr) {
                console.log(result);
                if (result.info == 200) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se Guardo Correctamente.',
                        showConfirmButton: true,
                        timer: 3000
                    });
                    window.history.back();
                  //  location.reload();
                } else if (result.info == 500){
                    Swal.fire({
                      position: 'center',
                      icon: 'error',
                      title: 'Ups!, ah ocurrido un error.',
                      showConfirmButton: true,
                      timer: 2500
                    });
                  } else if (result.info == 'ya existe'){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Numero de Documento ya existe!!',
                        showConfirmButton: true,
                        timer: 1500
                    })
                }
            },
            error: function (jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    $('body').on('click', '.editPaciente', function (e) {
        e.preventDefault();
        let idpacient = $(this).attr('id');
       
        $.get("/paciente-dato-edit/" + idpacient, function (data) {
            
            $('.form-data').append('<input type="hidden" class="id_paciente" value="' + data.num_documento + '">');

            $.each(data, function (key, values) {
                $('#fK_id_tipdocumento').val(values.nomdocumento);
                $('#num_documento').val(values.num_documento);
                $('#num_documento1').val(values.num_documento);
                $('#nombre1').val(values.nombre1);
                $('#nombre2').val(values.nombre2);
                $('#apellido1').val(values.apellido1);
                $('#apellido2').val(values.apellido2);
                $('#fK_id_genero').val(values.generonom);
                $('#selectDepart').val(values.depart);
                $('#fk_id_municipio').val(values.municipio);
            });
            let idpac =  $('#num_documento').attr('disabled', true);
            $('#ModalPaciente').modal('show');
        });
    });

    $('body').on('click', '.js--btnedit--paciente', function (e) {
        e.preventDefault();

        const params = {
            'fK_id_tipdocumento': $('#fK_id_tipdocumento option:selected').val(),
            'num_documento': $('#num_documento1').val(),
            'nombre1': $('#nombre1').val(),
            'nombre2': $('#nombre2').val(),
            'apellido1': $('#apellido1').val(),
            'apellido2': $('#apellido2').val(),
            'fK_id_genero': $('#fK_id_genero option:selected').val(),
            'fk_id_departamento': $('#selectDepart option:selected').val(),
            'fk_id_municipio': $('#fk_id_municipio option:selected').val(), 
        }
      // console.log(params);
        $.ajax({
            url: '/prueba-editpaciente/',
            dataType: 'JSON',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({params}),
            success: function (data, textStatus, jQxhr) {
                console.log(data);
                if (data.info == 200) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Actualizado Correctamente.',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('#ModalPaciente').modal('hide');
                   /* $('.id_segment').val('');
                    $('#name_segments').val('');
                    $('.js--button--editsegment').remove();
                    $('#ModalSegment').modal('hide');*/
                    location.reload();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
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
    });


});

$(document).on('click', '.deletePaciente', function (event) {

    let id = $(this).attr('id');
    console.log(id);
    Swal.fire({
        position: 'center',
        icon: 'info',
        title: 'Esta seguro que desea eliminar ' + id + '?',
        showConfirmButton: true,
        timer: 8000
    });
    $.ajax({
        url: '/api/paciente-delete/',
        dataType: 'JSON',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({'id': id }),
        success: function (data, textStatus, jQxhr) {
      //   console.dir(data);
          if(data.info == 200) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Se elimino Correctamente.',
                showConfirmButton: false,
                timer: 4500
            });
            location.reload();
          } else{
            Swal.fire({
              position:'center',
              icon: 'error',
              title: 'Ups!, ah ocurrido un error.',
              showConfirmButton: true,
              timer: 1500
            });
          }
        },
        error: function (jqXhr, textStatus, errorThrown) {
          console.log( errorThrown );
        }
      });
});