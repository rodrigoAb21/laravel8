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
        /*************************************************************
         *                       EMPLEADOS
         ************************************************************/

        DB::table('trabajador')->insert([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'carnet' => '7894562',
            'telefono' =>  '79864512',
            'direccion' => 'Av. Paraguá # 82 ',
            'tipo' => 'Administrador',
            'email' => 'juanp@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Jose',
            'apellido' => 'Menacho',
            'carnet' => '7456458',
            'telefono' =>  '75698124',
            'direccion' => 'Av. Uruguay # 11',
            'tipo' => 'Administrador',
            'email' => 'josem@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Francisco',
            'apellido' => 'Becerra',
            'carnet' => '8485265',
            'telefono' =>  '76054896',
            'direccion' => 'Av. Busch #785',
            'tipo' => 'Administrador',
            'email' => 'franciscob@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Manuel',
            'apellido' => 'Mercado',
            'carnet' => '8586954',
            'telefono' =>  '75489362',
            'direccion' => 'Av. Mutualista #45',
            'tipo' => 'Administrador',
            'email' => 'manuelm@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);

        DB::table('trabajador')->insert([
            'nombre' => 'Marta',
            'apellido' => 'Lopez',
            'carnet' => '8798456',
            'telefono' =>  '79844028',
            'direccion' => 'Av. Melchor Pinto #12',
            'tipo' => 'Administrador',
            'email' => 'martal@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);
    }
}
