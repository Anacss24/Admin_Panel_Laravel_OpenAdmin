<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->unsignedBigInteger('tp_funcionario_id');

            $table->foreign('tp_funcionario_id')
                  ->references('id_tp_funcionario')
                  ->on('tp_funcionario')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign(['tp_funcionario_id']);
            $table->dropColumn('tp_funcionario_id');
        });
    }
};