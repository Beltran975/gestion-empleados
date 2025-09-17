<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id('id_log');
            $table->unsignedBigInteger('id_usuario');
            $table->enum('accion', ['crear','editar','eliminar','login','logout']);
            $table->string('tabla_afectada', 50)->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')
                  ->references('id_usuario')
                  ->on('usuarios')
                  ->onDelete('cascade'); 
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
