<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';

    public function funcionario()
    {   
        // Está associada a uma única instância de Funcionario
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }
}