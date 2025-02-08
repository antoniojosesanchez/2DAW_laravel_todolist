<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('inicio') ;


# rutas ETIQUETA
Route::group(['controller' => EtiquetaController::class,
              'as'         => 'etiqueta.' ], function() 
{
    Route::get('/', 'listar')->name('listar') ;
    Route::get('/borrar/{etiqueta}', 'borrar')->name('borrar') ;
    Route::match(['get', 'post'], '/nueva', 'nueva')->name('nueva') ;
}) ;






##
# NO TOCAR ############################################################################################################
##
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
