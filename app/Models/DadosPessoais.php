<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadosPessoais extends Model
{
    protected $table = 'dados_pessoais';

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }
}