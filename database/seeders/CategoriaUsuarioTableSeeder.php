<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria_usuario')->insert([
            [
                'nome' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'usuario',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
