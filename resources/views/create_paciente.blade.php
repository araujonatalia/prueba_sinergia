@extends('layouts.app')
@section('title','crear Paciente')
@section('active3','active')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{asset('js/paciente/createPaciente.js')}}"></script>
<section class="content" style="background-color: rgb(236, 240, 245) !important">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="box-title" style="margin-left: 5px; color: #0b58a2">Registrar paciente</h2>
                    </div>
                    <div class="card-body">
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
                                    <select class="form-control" id="fk_id_municipio" style="width: 100%" required>>
                                        
                                    
                                    </select>
                                </div>
                            </div>  
                            <button type="button" class="btn btn-primary btn-block mt-5 js--btnreate--paciente">Guardar cambios</button> 
                        </form>   
                    </div>
                </div>
            </br>
        </br>
    </br>

            </div>
        </div> 
    </div>           
</section>

@endsection

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary js--button--vehicle">Guardar cambios</button>
          </div>
   