<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estagiario; 

class Funcionario extends Model

{  
    protected $table = 'funcionarios';
    // Chave primaria do tabela funcionario
    protected $primaryKey = 'id_funcionario';

    // Define os campos que podem ser preenchidos em massa usando o método create ou update. 
    protected $fillable = ['nome', 'email',  'tp_funcionario_id', 'usuario', 'cracha', 'ramal'];


    public function tipoFuncionario()
    {
        // O segundo argumento tp_funcionario_id indica que a chave estrangeira na tabela Funcionario
        return $this->belongsTo(Tp_funcionario::class, 'tp_funcionario_id'); // belongsTo indica que o modelo atual está em uma relação "pertence a" com outro modelo. Isso significa que cada instância do modelo atual está associada a uma única instância do outro modelo.
    }


    public function estagiario()
    {   
        // hasOne = Define um relacionamento de um para um,  possui exatamente um registro relacionado no modelo especificado. 
        return $this->hasOne(Estagiario::class, 'id_funcionario');
    }

    public function dadospessoais()
    {
        return $this->hasOne(DadosPessoais::class, 'id_funcionario');
    }

    
    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id_funcionario');
    }

    public function terceirizados()
    {
        return $this->hasOne(Terceirizados::class, 'id_funcionario');
    }

}

