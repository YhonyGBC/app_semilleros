<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Coordinadores;
use App\Http\Controllers\Semilleristas;
use App\Http\Controllers\ProyectosController;

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

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/coordinador/crear_usuario', [Coordinadores::class, 'form_creacion']);
Route::post('/coordinador/crear_usuario', [Coordinadores::class, 'crear']);
Route::get('/coordinador/listado', [Coordinadores::class, 'index'])->name('list_coordinadores');
Route::get('/coordinador/registrar_info', [Coordinadores::class, 'form_registro']);
Route::post('/coordinador/registrar_info', [Coordinadores::class, 'registrar']);

Route::get('/semillerista/listado', [Semilleristas::class, 'index'])->name('list_semilleristas');
Route::get('/semillerista/registrar_info', [Semilleristas::class, 'form_registro']);
Route::post('/semillerista/registrar_info', [Semilleristas::class, 'registrar']);

Route::get('/proyectos/listado', [ProyectosController::class, 'index'])->name('listadoProy');
Route::get('/proyectos/reportPDF', [ProyectosController::class, 'report'])->name('reportPDF');
Route::get('/proyectos/registrar', [ProyectosController::class, 'form_registro']);
Route::post('/proyectos/registrar', [ProyectosController::class, 'registrar']);
