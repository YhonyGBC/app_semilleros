<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Semillero;

class EventosController extends Controller
{
    public function index(){
        $eventos = Evento::with('semillero')->get();
        return view('eventos.listado', ['eventos' =>$eventos]);
    }

    public function registro_form(){
        $semilleros = Semillero::all();
        return view('eventos.event_registro', compact('semilleros'));
        
    }

    public function registrar_event(Request $r){
        $evento = new Evento();
        $evento->nombre = $r->input('inputName');
        $evento->descripcion = $r->input('inputDesc');
        $evento->fecha = $r->input('imputDate');
        $evento->lugar = $r->input('inputLugar');
        $evento->tipo = $r->input('imputTipo_event');
        $evento->modalidad = $r->input('imputModalidad');
        $evento->clasificacion = $r->input('imputClas');
        $evento->observaciones = $r->input('inputObs');
        $evento->save();
        return redirect()->route('listadoEve');
    }

    public function eliminar_event($id){
        $evento = Evento::findOrFail($id);
        $evento->delete();
        return redirect()->route('listadoEve');
    }
}
