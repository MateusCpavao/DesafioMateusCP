<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produtos extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    protected $fillable = ['user_id', 'categoria_id', 'nome', 'valor'];

    public function listaTodosProdutos()
    {

        $retorno = Produtos::join('users', 'produtos.user_id', '=', 'users.id')
                                    ->join('categoria_produto', 'produtos.categoria_id','=','categoria_produto.id')
                                    ->select('produtos.*', 'users.name AS nome_user', 'categoria_produto.nome AS nome_categoria')
                                    ->get();

        return $retorno;
    }

    public function listaProdutosUser($userId)
    {
        $retorno = Produtos::join('users', 'produtos.user_id', '=', 'users.id')
                            ->join('categoria_produto', 'produtos.categoria_id','=','categoria_produto.id')
                            ->where('users.id', '=', $userId)
                            ->select('produtos.*', 'users.name AS nome_user', 'categoria_produto.nome AS nome_categoria')
                            ->get();

        return $retorno;
    }

    public function listAll()
    {
        
        
        $tipoUsuario = new TipoUsuario;
            $tipoUsuario->fill([
            'user_id' => $user->getAuthIdentifier(),
            'categoria_usuario_id' => $categoriaUsuario
        ]);

        $tipoUsuario->save();
    }

    public function salvaProduto($user)
    {
        $categoriaUsuario = DB::table('categoria_usuario')->where('nome', 'usuario')->value('id');
        
        $tipoUsuario = new TipoUsuario;
            $tipoUsuario->fill([
            'user_id' => $user->getAuthIdentifier(),
            'categoria_usuario_id' => $categoriaUsuario
        ]);

        $tipoUsuario->save();
    }

    public function atualizaProduto($user)
    {
        $categoriaUsuario = DB::table('categoria_usuario')->where('nome', 'usuario')->value('id');
        
        $tipoUsuario = new TipoUsuario;
            $tipoUsuario->fill([
            'user_id' => $user->getAuthIdentifier(),
            'categoria_usuario_id' => $categoriaUsuario
        ]);

        $tipoUsuario->save();
    }
    public function deletaProduto($user)
    {
        $categoriaUsuario = DB::table('categoria_usuario')->where('nome', 'usuario')->value('id');
        
        $tipoUsuario = new TipoUsuario;
            $tipoUsuario->fill([
            'user_id' => $user->getAuthIdentifier(),
            'categoria_usuario_id' => $categoriaUsuario
        ]);

        $tipoUsuario->save();
    }
}
