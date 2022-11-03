<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable([
            'users',
            'user_datas'
        ]);
        // \App\Models\User::factory(10)->create();

        $this->call(DepartamentoSeeder::class);
        $this->call(tipoDocSeeder::class);
        $this->call(PacientesSeeder::class);
        $this->call(UsersSeeder::class);


    }

    // metodo que se encargara de eliminar las tablas cuando vuelve y se ejecuta el comando DB:seeders
    // esto con el fin de no repertir informacion en la base de datos cada vez que se invoque este comando

    public function truncateTable (array $tables){
    DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
