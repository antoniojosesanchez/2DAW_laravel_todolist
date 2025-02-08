<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarea', function (Blueprint $table) 
        {
            $table->id('idtar');
            $table->text('texto') ;
            $table->boolean('completa')->default(false) ;

            $table->timestamp('fecha') ;

            # clave foránea hacia USUARIO
            $table->foreignId('idusu')->constrained('usuario', 'idusu')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea');
    }
};
