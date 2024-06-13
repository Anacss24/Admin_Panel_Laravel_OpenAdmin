<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tp_funcionario extends Model // Model são usados para interagir com o banco de dados 
{

    protected $table = 'tp_funcionario'; // Define o nome da tabela no banco de dados que este modelo representa.
    protected $fillable = ['tipo']; // especifica quais colunas da tabela podem ser preenchidas em massa (usando o método create ou update)
   
    protected $primaryKey = 'id_tp_funcionario';

    public function funcionario()
    {
        return $this->hasMany(Funcionario::class, 'id_tp_funcionario'); // O método hasMany() é usado para definir uma relação de "um para muitos" entre modelos. 
    }

   
}