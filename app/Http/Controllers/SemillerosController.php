<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Semillero;
use App\Models\Semillerista; /*Importación del modelo semillerista para la edición de datos en el Sprint 2 - Juan Guzmán*/
use App\Models\Coordinador; /* Importación del modelo Coordinador para la edición de datos en el Sprint 2 - Juan Guzmán */



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
        return redirect()->route('list_semilleros');
    }

    /* Sprint 2 - Juan Guzmán */

    public function eliminar($id){
        $semillero = Semillero::findOrFail($id);
        
        $existenSemilleristas = Semillerista::where('semillero_id', $id)->exists();
        $existenCoordinadores = Coordinador::where('semillero_id', $id)->exists();
    
        if ($existenSemilleristas) {
            return redirect()->back()->with('error', 'No se puede eliminar el semillero porque existen semilleristas asociados.');
        } elseif ($existenCoordinadores) {
            return redirect()->back()->with('error', 'No se puede eliminar el semillero porque existen coordinadores asociados.');
        }
    
        $semillero->delete();
        return redirect()->route('list_semilleros');
    }

    public function form_edicion($nombre) {
        $semillero = Semillero::where('nombre', $nombre)->first();

        if (!$semillero) {
            return redirect()->route('list_semilleros');
        }
    
        return view('semilleros.form_edicion', compact('semillero'));
    }
    
    public function editar(Request $request, $nombre) {
        $semillero = Semillero::where('nombre', $nombre)->first();
    
        if (!$semillero) {
            return redirect()->route('list_semilleros');
        }
    
        $nuevoCorreo = $request->input('correo');
    
        if ($nuevoCorreo !== $semillero->correo) {
            $existenciaCorreo = Semillero::where('correo', $nuevoCorreo)->exists();
            if ($existenciaCorreo) {
                return redirect()->back()->with('error', 'El correo ya está registrado.');
            }
        }
    
        $request->validate([
            // 'nombre' => 'required',
            'correo' => 'required',
            // 'logo' => 'url', 
            // 'fecha' => 'required',
            'num_resolucion' => 'required',
            // 'descripcion' => 'required',
            // 'mision' => 'required',
            // 'vision' => 'required',
            // 'valores' => 'required',
            // 'objetivos' => 'required',
            // 'lineas_investigacion' => 'required',
        ]);
        
        // $semillero->nombre = $request->input('nombre');
        $semillero->correo = $request->input('correo');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $semillero->logo = $logoPath;
        }

        // $semillero->fecha = $request->input('fecha');
        $semillero->num_resolucion = $request->input('num_resolucion');
        $semillero->descripcion = $request->input('descripcion');
        $semillero->mision = $request->input('mision');
        $semillero->vision = $request->input('vision');
        $semillero->valores = $request->input('valores');
        $semillero->objetivos = $request->input('objetivos');
        $semillero->lineas_investigacion = $request->input('lineas_investigacion');
    
        $semillero->save();

        return redirect()->route('list_semilleros');
    }
}