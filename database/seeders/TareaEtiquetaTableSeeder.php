<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TareaEtiquetaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [] ;

        # instanciamos la clase Faker para generar datos aleatorios
        $faker = Faker::create() ;

        # utilizamos un bucle para hacer las asociaciones
        for($total=0; $total < 30; $total++):
            array_push($datos, [ 'idtar' => $faker->numberBetween(1, 30), 'ideti' => $faker->numberBetween(1, 15) ]) ;
        endfor ;

        # lanzamos la consulta sobre la base de datos utilizando una QUERY
        DB::table('tarea_etiqueta')->insert($datos) ;
    }
}
