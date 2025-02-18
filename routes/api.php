<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EtiquetaController ;
use App\Http\Controllers\ApiAuthenticationController;



Route::group(['prefix' => 'v1'], function()
{
    Route::post('/login', [ApiAuthenticationController::class, 'login']) ;

    # recuperamos las etiquetas
    Route::get('/etiquetas', [EtiquetaController::class, "listar"]) ;

    # creamos una nueva etiqueta
    Route::post('/etiqueta', [EtiquetaController::class, "crear"]) ;
}) ;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
