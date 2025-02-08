<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash ;
use App\Models\Usuario ;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([ 
            'nombre'    => 'Usuario',
            'apellidos' => 'administrador',
            'email'     => 'admin@todolist.com', 
            'password'  => Hash::make('12345678'),
        ]) ;

    }
}
