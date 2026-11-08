<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            // 1. Llave primaria autoincremental (ID)
            $table->id(); 
            
            // 2. Relación: ID del usuario que creó la tarea (Llave foránea)
            // Si el usuario se borra, sus tareas también se borran (cascade)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // 3. Campo de texto para el título, con un ÍNDICE para búsquedas rápidas
            $table->string('titulo')->index(); 
            
            // 4. Campo de texto largo para la descripción 
            $table->text('descripcion')->nullable(); 
            
            // 5. Campo booleano (verdadero/falso) por defecto será falso
            $table->boolean('completada')->default(false); 
            
            // 6. Crea de forma automatica los campos created_at y updated_at
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};