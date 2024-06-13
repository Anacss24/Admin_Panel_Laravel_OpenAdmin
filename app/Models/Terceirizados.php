<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Terceirizados extends Model
{  
    protected $table = 'terceirizado';

    protected $fillable = ['name', 'rg'];
    
    protected $primaryKey = 'id';

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario');
    }

    
    
}
