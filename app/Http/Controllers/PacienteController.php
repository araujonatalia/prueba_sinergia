<?php

namespace App\Http\Controllers;

use App\Models\departamentos;
use App\Models\generos;
use App\Models\municipios;
use App\Models\pacientes;
use App\Models\tipos_documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function btnView(){
      //  return "hola aqti";

        $type = tipos_documento::all();
        $genero = generos::all();
        $departamento = departamentos::all();
        //$municipio = municipios::all();
     //   return view('pesv.viewpesv')->with(['type' => $type, 'employed' => $employed, 'vehicles' => $vehicles, 'numInspeccion' => $numInspeccion]);
        return view('create_paciente')->with(['type' => $type, 'genero' => $genero, 'departamento' => $departamento, ]);

    }

    public function changeSelect($id){
        $municipio = municipios::where('fk_id_departamento', $id)->get();
        return response()->json($municipio);
    }

    public function pacienteId (Request $id){
        $paciente = pacientes::where('num_documento', $id->id);
        $paciente->delete();
        return response()->json(['info' => '200']);
    }

    public function pacienteIdedit ($id){

         $paciente  = DB::table('pacientes')
        ->leftJoin('departamentos', 'pacientes.fk_id_departamento', '=', 'departamentos.id_departamento')
        ->leftJoin('municipios', 'pacientes.fk_id_municipio', '=', 'municipios.id_municipio')
        ->leftJoin('tipos_documento', 'pacientes.fK_id_tipdocumento', '=', 'tipos_documento.id_tipo_documento')
        ->leftJoin('generos', 'pacientes.fk_id_genero', '=', 'generos.id_genero')
        ->select('pacientes.id_paciente', 'pacientes.nombre1', 'pacientes.nombre2', 'pacientes.apellido1', 'pacientes.apellido2', 'pacientes.num_documento','tipos_documento.id_tipo_documento as nomdocumento',
         'generos.id_genero as generonom','municipios.id_municipio as municipio', 'departamentos.id_departamento as depart')
         ->where('pacientes.num_documento', $id)->get();
     
        return response()->json($paciente);
    }


    public function store(Request $request)
    {
        //Crear paciente 
        try{
            DB::beginTransaction();
            $data = $request->params;
           
            $vpac = pacientes::where('num_documento', $data['num_documento'])->first();

            if(empty($vpac)){
                $datas = new pacientes();
               
                $datas->fK_id_tipdocumento = $data['fK_id_tipdocumento'];
                $datas->num_documento = $data['num_documento'];
                $datas->nombre1 = $data['nombre1'];
                $datas->nombre2 = $data['nombre2'];
                $datas->apellido1 = $data['apellido1'];
                $datas->apellido2 = $data['apellido2'];
                $datas->fK_id_genero = $data['fK_id_genero'];
                $datas->fk_id_departamento =$data['fk_id_departamento'];
                $datas->fk_id_municipio = $data['fk_id_municipio'];
                // return $datas;
                $datas->save(); 

            } else{
                return response()->json(['info'=>'ya existe']);
            }
            DB::commit();
            
            return response()->json(['info'=>'200']);
        }catch (Exception $e){
            DB::rollBack();
            return response()->json(['info'=>'500']);
        }
    }

    public function editPaciente(Request $request){
        try{
            DB::beginTransaction();
            $data = $request->params;
          
            $datas = pacientes::where('num_documento', $data['num_documento'])->first();

            $datas->fK_id_tipdocumento = $data['fK_id_tipdocumento'];
            $datas->nombre1 = $data['nombre1'];
            $datas->nombre2 = $data['nombre2'];
            $datas->apellido1 = $data['apellido1'];
            $datas->apellido2 = $data['apellido2'];
            $datas->fK_id_genero = $data['fK_id_genero'];
            $datas->fk_id_departamento =$data['fk_id_departamento'];
            $datas->fk_id_municipio = $data['fk_id_municipio'];
            $datas->save();
           
            DB::commit();
           // return Response()->json([ 'IsValid' => 'true']);
            return response()->json(['info'=>'200']);
        }catch (Exception $e){
            DB::rollBack();
            return Response()->json([
                'IsValid' => 'false',
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
           // return response()->json(['info'=>'500']);
        }
    }



    /*
     

ublic function editInspection (Request $request){
        try{
            DB::beginTransaction();
            $data = inspectionPreoperational::find($request->idinspection);
            $data->name_inspection = $request->name_inspection;
            $data->save();
            DB::commit();
            return response()->json(['info'=>'200']);
        }catch (Exception $e){
            DB::rollBack();
            return response()->json(['info'=>'500']);
        }
    }


     
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      //  $eliminar = pacientes::find($id->id_paciente);
       // $eliminar->delete();
       // return response()->json(['info' => '200']);
    }
}
