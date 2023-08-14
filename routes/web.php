<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventosController;

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
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index']);

Route::get('/eventos/listado', [EventosController::class, 'index'])->name('listadoEve');
Route::get('/eventos/registrar', [EventosController::class, 'registro_form']);
Route::post('/eventos/registrar', [EventosController::class, 'registrar_event']);
Route::get('/eventos/eliminar/{id}', [EventosController::class, 'eliminar_event'])->name('eliminaEve');