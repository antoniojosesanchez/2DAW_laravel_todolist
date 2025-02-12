<?php

    /**
     * Desarrollo Web en Entorno Servidor
     * @author Antonio J. Sánchez Bujaldón
     */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    /**
     * Comprueba si el usuario logueado es administrador.
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {        
        #return match ($parametro) 
        #{
        #    'admin'     => $request->user()->admin?$next($request):to_route('home'),
        #    'seller'    => to_route('seller'),
        #    default     => to_route('home')
        #} ;

        if ($request->user()->admin) return $next($request);
        else return to_route('home') ;
        
    }
}
