<?php

namespace Database\Seeders;

use App\Models\generos;
use App\Models\tipos_documento;
use Illuminate\Database\Seeder;

class tipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tipo documento
        $tip_documento =[
            ['nombre' => 'Targeta Identidad', 'created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['nombre' => 'Cedula de Ciudadania', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Cedula de extranjeria',  'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
        ];
        foreach ($tip_documento as $dt) tipos_documento::insert($dt);

        //Genero

        $genero =[
            ['nombre' => 'Femenino', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Masculino', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'No binario', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
           
          ];     
        foreach ($genero as $gen) generos::insert($gen);
    }
}
