<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Semillero;



class SemillerosController extends Controller
{
    // Función que retorna la vista principal de los semilleros existentes.
    public function index() {
        $semilleros = DB::table('semilleros')->get();
        return view('semilleros.listado', ['semilleros' => $semilleros]);
    }

    // Función que retorna el formulario de registro de un nuevo semillero.
    public function form_registro() {
        return view('semilleros.form_registro');
    }

    public function registrar(Request $r) {
        // Validar los campos y procesar la imagen
        if ($r->hasFile('logo')) {
            $logoPath = $r->file('logo')->store('logos', 'public');
            \Log::info('Imagen de logo recibida correctamente');
            // 'logos' es el nombre de la carpeta donde se guardará la imagen
            // 'public' indica que estará en la carpeta 'storage/app/public'
        } else {
            \Log::info('No se recibió ninguna imagen de logo');
            $logoPath = null;
        }

        $semillero = new Semillero();
        $semillero->nombre = $r->input('nombre');
        $semillero->correo = $r->input('correo');
        $semillero->logo = $logoPath;
        $semillero->fecha = $r->input('fecha');
        $semillero->num_resolucion = $r->input('num_resolucion');
        $semillero->descripcion = $r->input('descripcion');
        $semillero->mision = $r->input('mision');
        $semillero->vision = $r->input('vision');
        $semillero->valores = $r->input('valores');
        $semillero->objetivos = $r->input('objetivos');
        $semillero->lineas_investigacion = $r->input('lineas_investigacion');
        $semillero->save();
        return redirect()->route('home');
    }
}