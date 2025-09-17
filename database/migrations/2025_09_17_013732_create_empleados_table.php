<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->string('nombre');                  
            $table->date('fecha_nacimiento');         
            $table->string('curp', 18)->unique();      
            $table->string('domicilio');              
            $table->decimal('salario', 10, 2);         
            $table->enum('estado', ['activo', 'inactivo'])->default('activo'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};