<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ColoresEtiqueta extends Component
{

    const COLORES= ["Rosa"   => "e75480", "Azul"     => "0000ff",
                    "Verde"  => "00ff00", "Amarillo" => "ffff00",
                    "Morado" => "9b59b6", "Marrón"   => "804000",
                    "Negro"  => "000000", "Rojo"     => "ff0000",
                    "Blanco" => "ffffff", "Magenta"  => "ff00ff",
                    "Gris"   => "666666", "Naranja"  => "ff8000", ] ;


    /**
     * Create a new component instance.
     */
    public function __construct(public string $seleccionado,                          
                                public array $colores=self::COLORES)
    {        
    }

    /**
     * Comprueba si un determinado color está seleccionado o no
     * @param string $color (del array)
     * @return boolean
     */
    public function seleccionado(string $color): bool 
    {
        #return $this->seleccionado == "#{$color}" ;
        return $color == ltrim($this->seleccionado, "#") ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.colores-etiqueta');
    }
}
