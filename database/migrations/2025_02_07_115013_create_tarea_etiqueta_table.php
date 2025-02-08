<?php

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
        Schema::create('tarea_etiqueta', function (Blueprint $table) 
        {
            $table->id('idte') ;

            # claves foráneas a TAREA y ETIQUETA
            $table->foreignId('idtar')->constrained('tarea', 'idtar')->onDelete('cascade') ;
            $table->foreignId('ideti')->constrained('etiqueta', 'ideti')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea_etiqueta');
    }
};
