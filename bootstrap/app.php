<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) { 
        # use: se utiliza para especificar TODOS los middleware que queremos utilizar
        # append, preppend: se utilizan para definir qué middleware se utiliza en TODAS las
        #                   peticiones HTTP.
        # alias: se utiliza para definir un alias para el middleware
        $middleware->alias(
            [
                'admin' => App\Http\Middleware\EsAdmin::class
            ]) ;
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
