<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Semillerista;
 
class Semilleristas extends Controller
{   
    public function index() {
        $semilleristas = DB::table('semilleristas')
            ->join('semilleros', 'semilleristas.semillero_id', '=', 'semilleros.id')
            ->select('semilleristas.*', 'semilleros.nombre as nombre_semillero')
            ->get();

        return view('semilleristas.listado', ['semilleristas' => $semilleristas]);
    }

    public function form_registro() {
        $semilleros = DB::table('semilleros')->get();
        return view('semilleristas.form_registro', ['semilleros' => $semilleros]);
    }

    public function registrar(Request $r) {
        $semillerista = new Semillerista();
        $semillerista->nombre = $r->input('nombre');
        $semillerista->identificacion = $r->input('identificacion');
        $semillerista->cod_estudiante = $r->input('cod_estudiante');
        $semillerista->direccion = $r->input('direccion');
        $semillerista->telefono = $r->input('telefono');
        $semillerista->correo = $r->input('correo');
        $semillerista->genero = $r->input('genero');
        $semillerista->fecha_nacimiento = $r->input('fecha_nacimiento');
        $semillerista->semestre = $r->input('semestre');
        $semillerista->prog_academico = $r->input('prog_academico');
        $semillerista->semillero_id = $r->input('semillero_id');
        $semillerista->save();
        return redirect()->route('list_semilleristas');
    }
}
