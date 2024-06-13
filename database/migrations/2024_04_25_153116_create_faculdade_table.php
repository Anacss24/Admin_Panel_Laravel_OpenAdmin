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
        Schema::create('faculdade', function (Blueprint $table) {
            $table->increments('id_faculdade');
            $table->string('nome');
            $table->unsignedInteger('estagiario_id')->nullable();
            $table->foreign('estagiario_id')->references('id_estagiario')->on('estagiarios')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculdade');
    }
};
