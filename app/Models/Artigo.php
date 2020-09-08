<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $fillable = [
        "id_usuario", "nome_veiculo", "link", "ano", "combustivel", "portas", "quilometragem", "cambio", "cor"
    ];
}
