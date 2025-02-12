<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Nombre real de la tabla
     * @var string
     */
    protected $table = 'usuario' ;

    /**
     * Nombre de la clave primaria
     * @var string
     */
    protected $primaryKey = 'idusu' ;

    /**
     * Atributos asignables en masa.
     * @var array
     */
    protected $fillable = ['nombre', 'email', 'apellidos', 'password', 'foto', 'admin' ];

    /**
     * Atributos que se ocultan en la serialización.
     * @var array
     */
    protected $hidden = ['password',] ;

    /**
     * Configuramos los atributos que se castean.
     * @return array
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed', 
            'admin'    => 'bool',
        ];
    }

    /**
     * relación 1:N entre usuario y tarea
     * @return void
     */
    public function tareas() 
    {
        return $this->hasMany(Tarea::class, 'idusu') ;
    }

    /**
     * @return string
     */
    public function __toString(): string 
    {
        return "{$this->nombre} {$this->apellidos}" ;
    }

}
