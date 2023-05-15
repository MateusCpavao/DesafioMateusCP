<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $user_id = DB::table('users')->where('email', 'test@example.com')->value('id');

         $categoria_id = DB::table('categoria_usuario')->where('nome', 'admin')->value('id');
 
         DB::table('tipo_usuario')->insert([
             [
                 'user_id' => $user_id,
                 'categoria_usuario_id' => $categoria_id,
                 'created_at' => now(),
             ]
         ]);
    }
}
