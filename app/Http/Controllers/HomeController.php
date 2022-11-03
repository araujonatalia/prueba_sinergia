<?php

namespace App\Http\Controllers;

use App\Models\departamentos;
use App\Models\generos;
use App\Models\tipos_documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {       

        //registros de pacientes
      $pacientesAll = DB::table('pacientes')
       ->leftJoin('departamentos', 'pacientes.fk_id_departamento', '=', 'departamentos.id_departamento')
       ->leftJoin('municipios', 'pacientes.fk_id_municipio', '=', 'municipios.id_municipio')
       ->leftJoin('tipos_documento', 'pacientes.fK_id_tipdocumento', '=', 'tipos_documento.id_tipo_documento')
       ->leftJoin('generos', 'pacientes.fk_id_genero', '=', 'generos.id_genero')
       ->select('pacientes.id_paciente', 'pacientes.nombre1', 'pacientes.nombre2', 'pacientes.apellido1', 'pacientes.apellido2', 'pacientes.num_documento','tipos_documento.nombre as nomdocumento',
        'generos.nombre as generonom','municipios.nombre as municipio', 'departamentos.nombre as depart')
       ->get();

       $datos = [];
       foreach ($pacientesAll as $item) {
           $datos[] = [
            'id' => $item->id_paciente,
            'nombres' => $item->nombre1 .' '. $item->nombre2 ,
            'apellidos' => $item->apellido1 .' '. $item->apellido2,
            'cc' => $item->num_documento,
            'tipo' => $item->nomdocumento,
            'genero' => $item->generonom,
            'departamento' => $item->depart,
            'municipio' => $item->municipio,
           ];
       }
       $type = tipos_documento::all();
       $genero = generos::all();
       $departamento = departamentos::all();

        return view('home')->with(['type' => $type, 'genero' => $genero, 'departamento' => $departamento, 'datos' => $datos]);
    }

    public function listPaciente(){
          //registros de pacientes
          $pacientesAll = DB::table('pacientes')
          ->leftJoin('departamentos', 'pacientes.fk_id_departamento', '=', 'departamentos.id_departamento')
          ->leftJoin('municipios', 'pacientes.fk_id_municipio', '=', 'municipios.id_municipio')
          ->leftJoin('tipos_documento', 'pacientes.fK_id_tipdocumento', '=', 'tipos_documento.id_tipo_documento')
          ->leftJoin('generos', 'pacientes.fk_id_genero', '=', 'generos.id_genero')
          ->select('pacientes.id_paciente', 'pacientes.nombre1', 'pacientes.nombre2', 'pacientes.apellido1', 'pacientes.apellido2', 'pacientes.num_documento','tipos_documento.nombre as nomdocumento',
           'generos.nombre as generonom','municipios.nombre as municipio', 'departamentos.nombre as depart')
          ->get();

       $datos = [];
       foreach ($pacientesAll as $item) {
           $datos[] = [
            'id' => $item->id_paciente,
            'nombres' => $item->nombre1 .' '. $item->nombre2 ,
            'apellidos' => $item->apellido1 .' '. $item->apellido2,
            'cc' => $item->num_documento,
            'tipo' => $item->nomdocumento,
           'genero' => $item->generonom,
           'departamento' => $item->depart,
           'municipio' => $item->municipio,
           ];
       }
       return response()->json($datos);
    }
}
