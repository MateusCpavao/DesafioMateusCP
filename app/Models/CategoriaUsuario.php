<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaUsuario extends Model
{
    use HasFactory;

    protected $table = 'categoria_usuario';

    protected $fillable = ['nome'];

}
