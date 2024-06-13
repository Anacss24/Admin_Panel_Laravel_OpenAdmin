<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cursos extends Model // Model são usados para interagir com o banco de dados 
{

    protected $table = 'cursos'; // Define o nome da tabela no banco de dados que este modelo representa.
    protected $fillable = ['nome']; // especifica quais colunas da tabela podem ser preenchidas em massa (usando o método create ou update)

    public function estagiario()
    {
        return $this->hasMany(Estagiario::class, 'id_curso', 'id_estagiario');
   }
}

