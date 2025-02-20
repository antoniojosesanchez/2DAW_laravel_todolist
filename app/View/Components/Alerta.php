<?php

/** 
 *  Desarrollo Web en Entorno Servidor
 *  @author Antonio J. Sánchez Bujaldón    
 */

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alerta extends Component
{
    const COLORES = [ "error"   => "#ff0000",
                      "warning" => "#fac637",
                      "success" => "#59cf36",
                      "info"    => "#88e3c6" ] ;

    # colorDelMensaje --> color-del-mensaje
    public string $color ;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $tipo)
    {
        $this->color = self::COLORES[$tipo] ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerta');
    }
}
