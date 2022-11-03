<?php

namespace Database\Seeders;

use App\Models\pacientes;
use Illuminate\Database\Seeder;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*'fK_id_tipdocumento',
        'num_documento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'foto',
        'fK_id_genero',
        'fk_id_departamento',
        'fk_id_municipio',*/
        //Pacientes
        $pacientes =[
            ['fK_id_tipdocumento' => '1', 'num_documento' => '34345453', 'nombre1' => ' Carlos', 'nombre2' => 'Andres', 'apellido1' => 'zapedro', 'apellido2' => '', 'fK_id_genero' => '2', 'fk_id_municipio' => '2', 'created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['fK_id_tipdocumento' => '2', 'num_documento' => '45454652', 'nombre1' => 'Cristian', 'nombre2' => ' David', 'apellido1' => 'vargas', 'apellido2' => 'pulido', 'fK_id_genero' => '2' , 'fk_id_municipio' => '10', 'created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['fK_id_tipdocumento' => '2', 'num_documento' => '53453455', 'nombre1' => 'Alejandro', 'nombre2' => ' Nicolas', 'apellido1' => 'sanchez', 'apellido2' => 'cobo', 'fK_id_genero' => '3' , 'fk_id_municipio' => '6', 'created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['fK_id_tipdocumento' => '2', 'num_documento' => '45345457', 'nombre1' => 'Vanessa', 'nombre2' => '', 'apellido1' => 'Gomez', 'apellido2' => '', 'fK_id_genero' => '1', 'fk_id_municipio' => '3', 'created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['fK_id_tipdocumento' => '3', 'num_documento' => '87978978', 'nombre1' => 'Martina', 'nombre2' => 'luz', 'apellido1' => 'dorado', 'apellido2' => 'araujo', 'fK_id_genero' => '1', 'fk_id_municipio' => '8', 'created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
        ];
        foreach ($pacientes as $pac) pacientes::insert($pac);
    }
}
