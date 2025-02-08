<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etiqueta ;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etiqueta>
 */
class EtiquetaFactory extends Factory
{

    /**
     * Modelo asociado a la factoría
     * @var 
     */
    protected $model = Etiqueta::class ;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'etiqueta'  => fake()->word(),
            'color'     => fake()->hexColor(),
        ];
    }
}
