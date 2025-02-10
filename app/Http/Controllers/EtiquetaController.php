<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta ;

class EtiquetaController extends Controller
{

    /**
     * Muestra un listado de etiquetas
     * @param Request $request
     * @return void
     */
    public function listar(Request $request) 
    {
        return view("etiquetas.listar", [ "etiquetas" => Etiqueta::all() ]) ;
    }

    /**
     * Borramos sin confirmación y redirigimos al listado de rutas
     * @param Request $request
     * @param Etiqueta $etiqueta
     * @return
     */
    public function borrar(Request $request, Etiqueta $etiqueta) 
    {
        $etiqueta->delete() ;
        return to_route('etiqueta.listar') ;
    }

    /**
     * Muestra el formulario de creación de una nueva etiqueta y, cuando
     * recibe la información, la valida e inserta en la base de datos.
     * @param Request $request
     * @return void
     */
    public function nueva(Request $request) 
    {
        # redirigimos al formulario de creación
        if($request->isMethod('get')) return view('etiquetas.nueva') ;

        # si tenemos información para crear la etiqueta:
        # validamos en primer lugar
        $request->validate([
            'nombre' => 'max:10|alpha:ascii|required',
            'color'  => 'hex_color',
        ]) ;

        # insertamos la etiqueta
        Etiqueta::create([
            'etiqueta' => $request->input('nombre'),
            'color' => $request->input('color'),
        ]) ;

        # redirigimos al listado de vistas
        return to_route('etiqueta.listar') ;
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function Editar(Request $request, Etiqueta $etiqueta)
    {
        # redirigimos al formulario de edición
        if ($request->isMethod('get')) 
            return view('etiquetas.editar' , ['etiqueta' => $etiqueta]) ;
        
         # si tenemos información para crear la etiqueta:
        # validamos en primer lugar
        $request->validate([
            'nombre' => 'max:10|alpha:ascii|required',
            'color'  => 'hex_color',
        ]) ;

        # insertamos la etiqueta
        $etiqueta->update([
            'etiqueta' => $request->input('nombre'),
            'color' => $request->input('color'),
        ]) ;

        # redirigimos al listado de vistas
        return to_route('etiqueta.listar') ;
    }
}
