<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('endereco', function (Blueprint $table) {
            $table->unsignedBigInteger('id_funcionario')->nullable();
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('endereco', function (Blueprint $table) {
            //
        });
    }
};
