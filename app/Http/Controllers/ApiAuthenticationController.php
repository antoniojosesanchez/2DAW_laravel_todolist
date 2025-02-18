<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Validation\Rules\Password ;

class ApiAuthenticationController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function login(Request $request) 
    {
         # validamos los campos del formulario
         $validador = Validator::make( $request->all(), 
         [
             'email'    => 'required|string|email',
             'password' => ['required', 'string', Password::min(8)],
         ]) ;

         # intentamos loguearnos
         if (Auth::attempt($request->only(['email', 'password']))):

            # El método fingerprint genera un código aleatorio para proteger
            # la aplicación contra ataques CSRF
            $token = Auth::user()->createToken( time() ) ;

            return response()->json([
                'status'  => 'success',
                'code'    => 200,
                'message' => 'Login efectuado con éxito',
                'data'    => [ 
                    'token' => $token->plainTextToken,
                ]
                ], 200) ;

        endif ;

        # si el proceso de autenticación falla
        return response()->json([
            'status'    => 'failed',
            'code'      => 401,
            'message'   => 'Credenciales incorrectas',
        ], 401) ;
    }
}
