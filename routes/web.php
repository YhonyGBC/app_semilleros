<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/dashboard', [HomeController::class, 'index']);

Route::get('/proyectos/listado', [ProyectosController::class, 'index'])->name('listadoProy');
Route::get('/proyectos/reportPDF', [ProyectosController::class, 'report'])->name('reportPDF');
Route::get('/proyectos/registrar', [ProyectosController::class, 'form_registro']);
Route::post('/proyectos/registrar', [ProyectosController::class, 'registrar']);