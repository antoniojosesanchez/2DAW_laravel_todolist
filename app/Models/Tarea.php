<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
	use HasFactory ;
	
	/**
     * Nombre real de la tabla
     * @var string
     */
    protected $table = 'tarea' ;

    /**
     * Nombre de la clave primaria
     * @var string
     */
    protected $primaryKey = 'idtar' ;

    /**
     * Atributos asignables en masa.
     * @var array
     */
    protected $fillable = ['idtar', 'texto', ];

	/**
     * No se utilizan los campos created_at y updated_at
     * @var boolean
     */
    public $timestamps = false ;

    /**
     * Configuramos los atributos que se castean.
     * @return array
     */
    protected function casts(): array
    {
		return [ 'fecha' => 'datetime', ]  ;
    }

	/**
     * relación 1:N entre usuario y tarea
     * @return void
     */
    public function usuario() 
    {
        return $this->belongsTo(Usuario::class, 'idusu') ;
    }

	/**
     * relación N:N entre tarea y etiqueta
	 * - modelo a recuperar
	 * - tabla pivote (intermedia)
	 * - clave foránea del modelo en que me encuentro
	 * - clave foránea del modelo con quien me relaciono
     * @return void
     */
	public function etiquetas()
	{
		return $this->belongsToMany(Etiqueta::class, 'tarea_etiqueta', 'idtar', 'ideti') ;
	}

}
