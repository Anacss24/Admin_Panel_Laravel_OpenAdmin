<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstagiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagiarios', function (Blueprint $table) {
            $table->increments('id_estagio');
            $table->string('nome_estagiário')->nullable();
            $table->string('nome_Conhecido')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->string('dt_nascimento')->nullable();
            $table->string('cidade_nascimento')->nullable();
            $table->string('tel_residencial')->nullable();
            $table->string('tel_celular')->nullable();
            $table->string('tel_emergencia')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('uf')->nullable();
            $table->string('numero')->nullable();
            $table->string('cidade')->nullable();
            $table->string('faculdade')->nullable();
            $table->string('curso')->nullable();
            $table->string('horario')->nullable();
            $table->string('setor')->nullable();
            $table->string('dt_inicio')->nullable();
            $table->string('dt_termino')->nullable();
            $table->string('ativo')->nullable();
            $table->string('renovar')->nullable();
            $table->string('inicio')->nullable();
            $table->string('termino')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estagiarios');
    }
}
