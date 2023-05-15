<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria_produto')->insert([
            [
                'nome' => 'sala',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'cozinha',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
