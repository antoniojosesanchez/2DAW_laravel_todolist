<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        # insertamos el usuario administrador
        $this->call([ UsuarioTableSeeder::class, ]) ;

        # invocamos las factorías a través de cada modelo
        \App\Models\Usuario::factory(10)->create() ;
        \App\Models\Tarea::factory(30)->create() ;
        \App\Models\Etiqueta::factory(15)->create() ;

        # realizamos asociaciones entre tareas y etiquetas
        $this->call([ TareaEtiquetaTableSeeder::class ]) ;

    }
}
