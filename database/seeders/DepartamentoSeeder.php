<?php

namespace Database\Seeders;

use App\Models\departamentos;
use App\Models\municipios;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //departamentos
 
        $departamentos =[
            ['nombre' => 'Bogota', 'created_at' => date('Y-m-d H:m:s'),'updated_at' => date('Y-m-d H:m:s')],
            ['nombre' => 'Valle del Cauca', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Cauca',  'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Cundinamarca', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Huila', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ]
        ];
        foreach ($departamentos as $dpt) departamentos::insert($dpt);

        //Municipios
        $municipios =[
            ['nombre' => 'Funza', 'fk_id_departamento'=> '1', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Soacha', 'fk_id_departamento'=> '1', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Cali', 'fk_id_departamento'=> '2', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Calima', 'fk_id_departamento'=> '2', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Popayan', 'fk_id_departamento'=> '3', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Piendamo', 'fk_id_departamento'=> '3', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Cota', 'fk_id_departamento'=> '4', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Facatativa', 'fk_id_departamento'=> '4', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Neiva', 'fk_id_departamento'=> '5', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['nombre' => 'Pitalito', 'fk_id_departamento'=> '5', 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
           
          ];     
        foreach ($municipios as $mnc) municipios::insert($mnc);
        





    }
}
