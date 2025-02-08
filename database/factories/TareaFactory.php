<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea ;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea::class>
 */
class TareaFactory extends Factory
{
    /**
     * Modelo asociado a la factoría
     * @var
     */
    protected $model = Tarea::class ;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'idusu'     => fake()->numberBetween(1, 10),
            'texto'     => fake()->text(),
            'completa'  => fake()->boolean(0.25),
            'fecha'     => fake()->dateTime(),
        ];
    }
}
