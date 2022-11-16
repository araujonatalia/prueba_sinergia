@extends('layouts.app')

@section('content')


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
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
                                        <button type="button" class="btn btn-primary btn-sm editPaciente" id="{{$ve['cc']}}" name="editPaciente"><i class="fas fa-edit" style="font-size: 15px;color: #faf6f6"></button>
                                        <button type="button" class="btn btn-danger btn-sm deletePaciente" id="{{$ve['cc']}}" name="deletePaciente"><i class="fas fa-trash-alt" style="font-size: 15px;color: #faf6f6"></button>
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
    <div class="modal fade bd-example-modal-lg" id="ModalPaciente" tabindex="-1" role="dialog" aria-labelledby="Modalunoimportante" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel" style=" padding-right: 300px;">Editar Paciente</h4>
          </div>
          <div class="modal-body">
            <form method="POST" action="/prueba-editpaciente/" id="formCreatePaciente">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <label>Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre1" placeholder="Primer Nombre" value="" required>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <label>Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre2" placeholder="Segundo Nombre" value="" required>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <label>Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido1" placeholder="Primer Apellido" value="" required>
                    </div>
                    <div class="form-group col-md-3 mb-2" >
                        <label>Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido2" placeholder="Segundo Apellido" value="" required>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <label> Tipo Documento*</label>
                        <input type="hidden" class="id-vehiculo" value="">
                        <select class="form-control" id="fK_id_tipdocumento" style="width: 100%" required>>
                            <option value="" class="" selected="selected">Seleccione... </option>
                            @foreach($type as $ty)
                                <option id="res" value="{{$ty->id_tipo_documento}}">{{$ty->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label>Numero Documento*</label>
                        <input type="number" class="form-control" id="num_documento" required>
                        <input type="hidden" class="form-control" id="num_documento1" required>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label> Genero*</label>
                        <select class="form-control" id="fK_id_genero" style="width: 100%" required>
                            <option value="">Seleccione... </option>
                            @foreach($genero as $ge)
                                <option value="{{$ge->id_genero}}">{{$ge->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label> Departamento*</label>
                        <select class="form-control Depart target" id="selectDepart" style="width: 100%" required>>
                            <option value="">Seleccione... </option>
                            @foreach($departamento as $de)
                                <option value="{{$de->id_departamento}}">{{$de->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label> Municipio*</label>
                        <select class="form-control" id="fk_id_municipio" style="width: 100%" required>
                            <option value="">Seleccione Pirmero Departamento... </option>
                            @foreach($municipio as $de)
                                <option value="{{$de->id_municipio}}">{{$de->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  
                <button type="button" class="btn btn-primary js--btnedit--paciente mt-4 btn-block">Guardar cambios</button>
                <!--button type="button" class="btn btn-primary btn-block mt-5 js--btnreate--paciente">Guardar cambios</button--> 
            </form>   
         <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
           
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="{{asset('/js/paciente/createPaciente.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
       var tabla=  $("#tablepacientes").DataTable()
      // setInterval(tabla, 25000);
});
</script>
@endsection



