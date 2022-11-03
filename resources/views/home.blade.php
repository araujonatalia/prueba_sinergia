@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body">
                    <a class="btn btn-primary mb-4" href="{{url('/create-paciente/')}}">Crear Paciente</a>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-lg-12">
                        <table id="tablepacientes" class="table table-striped" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Tipo Doc.</th>
                                    <th>No. Documento</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Genero</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $ve)
                                <tr>
                                  <td>{{$ve['tipo']}}</td>
                                  <td>{{$ve['cc']}}</td>
                                  <td>{{$ve['nombres']}}</td>
                                  <td>{{$ve['apellidos']}}</td>
                                  <td>{{$ve['genero']}}</td>
                                  <td>{{$ve['departamento']}}</td>
                                  <td>{{$ve['municipio']}}</td>
                                  <td>
                                    <span data-idpaciente="{{$ve['id']}}" class="js--btn--editPaciente" title="Actualizar"> <i class="fas fa-edit" style="font-size: 20px;color: green"></i></span>
                                    <a class="js--btn--deletepaciente" data-paciente="{{$ve['id']}}" title="Eliminar"  href=""> <i class="fas fa-trash-alt" style="font-size: 15px;color: red"></i></a>
                                  </td>
                                  @endforeach
                                

                            </tbody>
                          
                            <tfoot>
                                <tr>
                                    <th>Tipo Doc.</th>
                                    <th>No.Documento</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Genero</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>


<div  class="col-lg-12">
    <div class="modal fade bd-example-modal-lg" id="ModalVehicle" tabindex="-1" role="dialog" aria-labelledby="Modalunoimportante" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Crear Vehiculo</h4>
          </div>
          <div class="modal-body">
          <form method="POST" action="/api/saveVehicle" id="formCreateVehicle">
            <form method="POST" action="/prueba-createpaciente" id="formCreatePaciente">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre1" placeholder="Primer Nombre" value="" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre" value="" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido1" placeholder="Primer Apellido" value="" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido" value="" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Tipo Documento*</label>
                        <input type="hidden" class="id-vehiculo" value="">
                        <select class="form-control" id="fK_id_tipdocumento" style="width: 100%" required>>
                            <option value="" class="">Seleccione... </option>
                            @foreach($type as $ty)
                                <option id="res" value="{{$ty->id_tipo_documento}}">{{$ty->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Numero Documento*</label>
                        <input type="number" class="form-control" id="num_documento" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label> Genero*</label>
                        <select class="form-control" id="fK_id_genero" style="width: 100%" required>
                            <option value="" class="">Seleccione... </option>
                            @foreach($genero as $ge)
                                <option value="{{$ge->id_genero}}">{{$ge->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Departamento*</label>
                        <select class="form-control Depart target" id="selectDepart" style="width: 100%" required>>
                            <option value="" selected="selected" class="">Seleccione... </option>
                            @foreach($departamento as $de)
                                <option value="{{$de->id_departamento}}">{{$de->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Municipio*</label>
                        <select class="form-control" id="fk_id_municipio" style="width: 100%" required>
                            <option value="" selected="selected" class="">Seleccione Pirmero Departamento... </option>
                        </select>
                    </div>
                </div>  
                <button type="button" class="btn btn-primary btn-block mt-5 js--btnreate--paciente">Guardar cambios</button> 
            </form>   
      
         <br>

          <div class="from"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary js--button--vehicle">Guardar cambios</button>
          </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {

   /* $.get("/List-paciente/", function (data) {
        console.log(data);
        var table =  $("#tablepacientes").DataTable({
            paging: true,
            searching: true,
            data: data,
            "destroy": true,
            columns: [
                { data: 'tipo'} ,
                { data: 'cc' },
                { data: 'nombres' },
                { data: 'apellidos' },
                { data: 'genero' },
                { data: 'departamento' },
                { data: 'municipio' },
                { "data": null,
                    render: function(data, type, row){
                        return "<form action='/prueba-editpaciente' method='POST'>" +
                                "<a data-paciente='"+data['id']+"' class='btn btn-primary btn--editPaciente' title='Actualizar' id='editartype'><i class='fa fa-edit' style='font-size: 15px; color: white'></i></a>"+
                                "<input type='hidden' name='idpaciente' value='"+data['id']+"'>"+
                                "<button class='btn btn-primary' type='submit' style='margin-left: 20px;'><i class='fas fa-trash' style='text-align: center;font-size: 15px;color: rgb(236, 236, 240)'></i></button>"+
                                "<button data-pac='"+data['id']+"' class='btn btn-warning btn--deletePaciente' type='submit' style='margin-left: 20px;'><i class='fas fa-trash' style='text-align: center;font-size: 15px;color: rgb(236, 236, 240)'></i></button>";
                                      "</form>";
                    },
                "targets": -1
                }
            ],
        });
    });*/
});
</script>
@endsection


