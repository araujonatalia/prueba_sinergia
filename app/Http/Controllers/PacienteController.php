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

    public function pacienteId ($id){
        $paciente = pacientes::where('id_paciente', $id)->first();
        return response()->json($paciente);
    }

    public function store(Request $request)
    {
        //guardar paciente 
        try{
           // dd($request->num_documento);
            $data = $request->params;
            DB::beginTransaction();
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
            $datas->save();
    
            DB::commit();
            return response()->json(['info'=>'200']);
            }catch (Exception $e){
                DB::rollBack();
             return response()->json(['info'=>'500']);
            }
    }

    public function edit(Request $request){
        try{
            DB::beginTransaction();
         //$data->name_inspection = $request->name_inspection;
           // $data->save();
            DB::commit();
            return response()->json(['info'=>'200']);
        }catch (Exception $e){
            DB::rollBack();
            return response()->json(['info'=>'500']);
        }
    }

    public function deletePaciente($id){

        $eliminar = pacientes::find($id);
        $eliminar->delete();
        return response()->json(['info' => '200']);
    }


    /*
     //add inspection
    public function createInspection(Request $request){
        try{
        DB::beginTransaction();
        $datas = new inspectionPreoperational();
        $datas->name_inspection = $request->name_inspection;
        $datas->save();

        DB::commit();
        return response()->json(['info'=>'200']);
        }catch (Exception $e){
            DB::rollBack();
         return response()->json(['info'=>'500']);
        }
    }

    public function editInspection (Request $request){
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

    public function deleteInspection(Request $request){

        $eliminar = inspectionPreoperational::find($request->idinspection);
        $eliminar->delete();
        return response()->json(['info' => '200']);
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
