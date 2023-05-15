<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Obtém o ID do usuário padrão que será associado aos produtos
         $user_id = DB::table('users')->where('email', 'test@example.com')->value('id');

         // Obtém o ID da categoria padrão que será associada aos produtos
         $categoria_id = DB::table('categoria_produto')->where('nome','cozinha')->value('id');
 
         // Insere alguns registros de exemplo na tabela de produtos
         DB::table('produtos')->insert([
             [
                 'nome' => 'Produto 1',
                 'valor' => 100.0,
                 'user_id' => $user_id,
                 'categoria_id' => $categoria_id,
                 'created_at' => now(),
             ],
             [
                 'nome' => 'Produto 2',
                 'valor' => 200.0,
                 'user_id' => $user_id,
                 'categoria_id' => $categoria_id,
                 'created_at' => now(),
             ],
             [
                 'nome' => 'Produto 3',
                 'valor' => 300.0,
                 'user_id' => $user_id,
                 'categoria_id' => $categoria_id,
                 'created_at' => now(),
             ],
         ]);
    }
}
