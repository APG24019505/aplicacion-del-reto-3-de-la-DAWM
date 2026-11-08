<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarea;
use App\Models\User; // Importamos el modelo User
use Illuminate\Support\Facades\Hash;

class TareaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creamos un usuario de prueba 
        $usuario = User::firstOrCreate(
            ['email' => 'prueba@ejemplo.com'],
            [
                'name' => 'Usuario de Prueba',
                'password' => Hash::make('password123'), 
            ]
        );

        // 2. Insertamos varias tareas asociadas a ese usuario
        Tarea::create([
            'user_id' => $usuario->id,
            'titulo' => 'Configurar base de datos MySQL',
            'descripcion' => 'Crear la base de datos, configurar el archivo .env y probar la conexión.',
            'completada' => true,
        ]);

        Tarea::create([
            'user_id' => $usuario->id,
            'titulo' => 'Instalar Laravel Breeze',
            'descripcion' => 'Añadir el sistema de autenticación al proyecto.',
            'completada' => true,
        ]);

        Tarea::create([
            'user_id' => $usuario->id,
            'titulo' => 'Realizar pruebas de compatibilidad',
            'descripcion' => 'Probar la aplicación en Chrome y Firefox, y correr Lighthouse.',
            'completada' => false,
        ]);
        
        Tarea::create([
            'user_id' => $usuario->id,
            'titulo' => 'Configurar dominio local y SSL',
            'descripcion' => 'Editar el archivo hosts y crear un certificado autofirmado.',
            'completada' => false,
        ]);
    }
}