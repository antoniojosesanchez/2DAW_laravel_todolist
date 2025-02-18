<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta ;

use Illuminate\Support\Facades\Validator ;

class EtiquetaController extends Controller
{

    # API #######################################################
    /**
     * @param Request $request
     * @return void
     */
    public function etiquetas(Request $request) 
    {        
        # recuperamos todas las etiquetas        
        $respuesta['data'] = Etiqueta::all() ;

        # código de respuesta
        $respuesta['code'] = 200 ;

        # generamos una respuesta (JSON, XML)
        return response()->json( $respuesta, $respuesta['code']) ;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function crear(Request $request) 
    {               
        # validamos los campos del formulario
        $validador = Validator::make( $request->all(), 
                [
                    'etiqueta'  => 'string|required|max:20',
                    'color'     => 'string|hex_color',
                ]) ;
        
        # comprobamos si hay errores
        if ($validador->fails()):
            $respuesta['status'] = 'failed' ;
            $respuesta['code']   = 400 ;
            $respuesta['errors'] = $validador->errors() ;
        else:
            $respuesta['status'] = 'success' ;
            $respuesta['code']   = 201 ;

            # creamos la etiqueta y la insertamos en la BD.
            Etiqueta::create([
                'etiqueta'  => $request->input('etiqueta'),
                'color'     => $request->input('color'),
            ]) ;
        endif ;

        # generamos una respuesta
        return response()->json($respuesta) ;
    }


    # WEB #######################################################
    /**
     * Muestra un listado de etiquetas
     * @param Request $request
     * @return void
     */
    public function listar(Request $request) 
    {
        # si utilizamos expectsJson hay que añadir a la petición HTTP
        # una cabecera indicando que esperamos un resultado en formato
        # JSON. 
        # Accept: application/JSON
        #if($request->expectsJson()):
        if ($request->is('api/*')):           

            # código de respuesta
            $respuesta['status'] = 'success' ;
            $respuesta['code']   = 200 ;

             # recuperamos todas las etiquetas        
            $respuesta['data'] = Etiqueta::all() ;            

            # generamos una respuesta (JSON, XML)
            return response()->json( $respuesta, $respuesta['code']) ;
        else :
            return view("etiquetas.listar", [ "etiquetas" => Etiqueta::all() ]) ;
        endif ;
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
