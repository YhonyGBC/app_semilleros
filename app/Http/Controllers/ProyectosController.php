<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Proyecto;
use App\Models\Semillero;

class ProyectosController extends Controller
{
    public function index(){
        //$proyectos = DB::table('proyectos')->get();
        $proyectos = Proyecto::with('semillero')->get();
        return view('proyectos.listado', ['proyectos' =>$proyectos]);
    }

    public function form_registro(){
        $semilleros = Semillero::all();
        return view('proyectos.form_registro', compact('semilleros'));
    }

    public function registrar(Request $r){
        
        // Validación de los campos si es necesario
        //dd($r->all());
        if ($r->hasFile('archivo')) {
            $archivo = $r->file('archivo');
            
            //dd($archivo);
            // Almacena el archivo en public/uploads
            $rutaDestino = $archivo->store('uploads', 'public');
            
            // Guarda la información en la base de datos
            $proyectos = new Proyecto();
            $proyectos->titulo = $r->input('inputTitle');
            $proyectos->integrantes = $r->input('inputInte');
            $proyectos->tipo_proyecto = $r->input('inputTipo');
            $proyectos->estado = $r->input('inputEstado');
            $proyectos->fecha_inicio = $r->input('inputDate_Ini');
            $proyectos->fecha_finalizacion = $r->input('inputDate_Fin');
            $proyectos->archivo_adjunto = $archivo->getClientOriginalName();
            $proyectos->semillero_id = $r->input('inputSemillero');
            $proyectos->save();
            return redirect()->route('listadoProy');
        } else {
            return redirect()->back()->with('error', 'No se ha seleccionado ningún archivo.');
        }
    }

    public function report(){
        $proyectos = Proyecto::with('semillero')->get();
        //dd($proyectos);
        $pdf = Pdf::loadView('proyectos.report', compact('proyectos'));
        return $pdf->setPaper('a4','landscape')->stream('proyectos_report.pdf');
    }

}
