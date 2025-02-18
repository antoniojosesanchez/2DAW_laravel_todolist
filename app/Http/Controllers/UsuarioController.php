<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage ;

use Illuminate\Validation\Rule ;
use Illuminate\Validation\Rules\File ;
use Illuminate\Validation\Rules\Password ;

use App\Rules\Twitter ;

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
                'password'  => ['string', 'nullable', Password::min(10)],
                'foto'      => ['image',
                                File::types(['jpg', 'png'])->max("1mb") ],                    

                'twitter'   => [ new Twitter ],
            ]);        

        # actualizamos el registro
        $request->user()->update([
            'nombre'    => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'email'     => $request->input('email'),            
        ]) ;

        # actualizamos la contraseña
        $password = $request->input('password') ;
        
        if ($password!=null):           
            $request->user()->password = Hash::make($password) ;
            $request->user()->save() ;                
        endif ;


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
        # FORMA TRADICIONAL CON PHP #############################################
        # recuperamos la ruta de acceso a la imagen desde la carpeta STORAGE
        #$ruta = storage_path("app/private/imagenes/{$request->user()->foto}") ;

        # recuperamos la imagen
        #if (file_exists($ruta)) $file = file_get_contents($ruta) ;
       
        # devolvemos una respuesta con la imagen
        #return response($file)->header('Content-Type', 'image/jpg') ;

        # UTILIZANDO LA CLASE STORAGE ###########################################
        # construimos la ruta a partir de la carpeta PRIVATE
        $ruta = "/imagenes/{$request->user()->foto}" ;

        # recuperamos la imagen
        #$file = Storage::get($ruta) ;

        # recuperamos el tipo MIME de la imagen
        #$tipoMIME = Storage::mimeType($ruta) ;

        # enviamos la respuesta con la imagen indicando en la cabecera
        # del paquete HTTP que el contenido es una imagen del tipo MIME
        # indicado.
        #return response($file)->header('Content-Type', $tipoMIME) ;

        # OTRO MÉTODO MÁS (by Sergio Gámez) ####################################
        # el método file recibe la ruta absoluta al archivo y lo envía
        # al navegador para que éste lo muestre de forma apropiada
        return response()->file(Storage::path($ruta)) ;
    }

}
