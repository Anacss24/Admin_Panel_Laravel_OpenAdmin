<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id_funcionario');
            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->string('tp_funcionario')->nullable();
            $table->string('usuario')->nullable();
            $table->string('cracha')->nullable();
            $table->string('ramal')->nullable();
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
        Schema::dropIfExists('funcionarios');
    }
}
