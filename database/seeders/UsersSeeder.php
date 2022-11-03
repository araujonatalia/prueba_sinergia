<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user =[
            ['name' => 'Usuario administrador', 'email' => 'administrador@gmail.com', 'password' => '$2y$10$LzEgquooy.rwOwcZsmielegIGL6.ASMsuE9UCqvdBQ9vu0twYpZSe' , 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
            ['name' => 'natalia martinez', 'email' => 'natikaraujo1@gmail.com', 'password' => '$2y$10$LzEgquooy.rwOwcZsmielegIGL6.ASMsuE9UCqvdBQ9vu0twYpZSe' , 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s') ],
          
           
          ];     
        foreach ($user as $usr) User::insert($usr);

    }
}
