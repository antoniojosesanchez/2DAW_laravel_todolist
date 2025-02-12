<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage ;

class UsuarioController extends Controller
{
    //

    /**     
     * @param Request $request
     * @return void
     */
    public function perfil(Request $request) 
    {        
        # validamos los campos del formulario
        $request->validate(
            [
                'nombre'    => 'required|string',
                'apellidos' => 'required|string',
                'email'     => 'required|email',
                'password'  => 'string|nullable',
                'foto'      => 'image|max:1024|mimes:jpg,png',
            ]);        

        # actualizamos el registro
        $request->user()->update([
            'nombre'    => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),            
        ]) ;


        # si estamos recibiendo una foto...
        if($request->hasFile('foto')):

            # recuperamos el archivo
            $file = $request->file('foto') ;            

            # nombre de la imagen
            $nombreImagen = $file->getClientOriginalName() ;

            # mover el archivo a nuestro sistema de ficheros
            # al disco privado y a la carpeta indicada
            $file->storeAs('imagenes', $nombreImagen) ;      

            # acualizamos el campo imagen
            $request->user()->update([ "foto" => $nombreImagen, ]) ;
        endif ;

        # redirección a la página principal
        return to_route('home') ;

    }


    /**
     * @param Request $request
     * @return void
     */
    public function imagen(Request $request) 
    {
        # FORMA TRADICIONAL CON PHP
        # recuperamos la ruta de acceso a la imagen
        $ruta = storage_path("app/private/imagenes/{$request->user()->foto}") ;

        # recuperamos la imagen
        $file = file_get_contents($ruta) ;

        # devolvemos una respuesta con la imagen
        return response($file)->header('Content-Type', 'image/jpg') ;
    }

}
