<?php

/**
 * Desarrollo Web en Entorno Servidor
 * @author Antonio J. Sánchez Bujaldón
 */

use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

# rutas PRINCIPAL
Route::view('/main', 'main')->middleware('auth')->name('home') ;

# rutas USUARIO
Route::view('/perfil', 'usuarios.perfil')->name('perfil') ;
Route::post('/perfil', [UsuarioController::class, "perfil"])->name('perfil.guardar') ;
Route::get('/imagen',  [UsuarioController::class, "imagen"])->name('perfil.imagen') ;

# rutas ETIQUETA
Route::group(['controller' => EtiquetaController::class,
              'middleware' => ['auth', 'admin'],
              'prefix'     => 'etiqueta',
              'as'         => 'etiqueta.' ], function() 
{
    Route::get('/', 'listar')->name('listar') ;
    Route::get('/borrar/{etiqueta}', 'borrar')->name('borrar') ;

    Route::match(['get', 'post'], '/nueva', 'nueva')->name('nueva') ;
    Route::match(['get', 'post'], '/editar/{etiqueta}', 'editar')->name('editar') ;
    
}) ;

# ruta error 404
Route::fallback(function() { return view('404') ; }) ;

##
# NO TOCAR ############################################################################################################
##


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';