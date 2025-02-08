<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory ;

    /**
     * Nombre real de la tabla
     * @var string
     */
    protected $table = 'etiqueta' ;

    /**
     * Nombre de la clave primaria
     * @var string
     */
    protected $primaryKey = 'ideti' ;

    /**
     * Atributos asignables en masa.
     * @var array
     */
    protected $fillable = ['etiqueta', 'color', ];

    /**
     * No se utilizan los campos created_at y updated_at
     * @var boolean
     */
    public $timestamps = false ;

    /**
     * relación N:N entre etiqueta y tarea
	 * - modelo a recuperar
	 * - tabla pivote (intermedia)
	 * - clave foránea del modelo en que me encuentro
	 * - clave foránea del modelo con quien me relaciono
     * @return void
     */
	public function tareas()
	{
		return $this->belongsToMany(Tarea::class, 'tarea_etiqueta', 'ideti', 'idtar') ;
	}
}
