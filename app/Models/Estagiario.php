<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estagiario extends Model

{   
    protected $table = 'estagiarios';
    protected $primaryKey = 'id_estagio';
    protected $fillable = ['dt_inicio', 'dt_termino','renovar', 'inicio','termino'];


    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

   
}
