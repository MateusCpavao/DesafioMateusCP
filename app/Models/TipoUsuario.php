<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $table = 'tipo_usuario';

    protected $fillable = ['user_id', 'categoria_usuario_id'];

    /**
     * Vincula usuario a grupo de acesso.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function salvaCadastro($user)
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
