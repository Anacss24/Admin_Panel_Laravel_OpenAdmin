<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Faculdades extends Model // Model são usados para interagir com o banco de dados 
{

    protected $table = 'faculdades'; // Define o nome da tabela no banco de dados que este modelo representa.
    protected $fillable = ['nome']; // especifica quais colunas da tabela podem ser preenchidas em massa (usando o método create ou update)

    public function estagiario()
    {   
        // Isso significa que cada instância de Faculdades pode ter muitas instâncias de Estagiario associadas a ela.
        return $this->hasMany(Estagiario::class, 'id_faculdade', 'id_estagiario');
   }
}

