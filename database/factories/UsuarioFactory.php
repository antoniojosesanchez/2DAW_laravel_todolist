<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

use App\Models\Usuario ;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Modelo asociado a la factoría
     * @var
     */
    protected $model = Usuario::class ;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'nombre'    => fake()->name(),
            'apellidos' => fake()->lastName(),
            'email'     => fake()->unique()->safeEmail(),
            'password'  => Hash::make('password'),
        ];
    }
}
