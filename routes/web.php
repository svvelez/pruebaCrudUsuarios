<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('menu');
});

Route::resource('usuarios', UsuariosController::class);
 Route::get('/menu',[UsuariosController::class,'menu'])->name('menu'); 
 Route::get('/login',[UsuariosController::class,'login'])->name('login'); 

/* Route::put('/usuarios/{id}', 'TuControlador@tuMetodo')->name('usuarios'); */
/* Route::get('/agregar',[UsuariosController::class,'create'])->name('agregar'); */
