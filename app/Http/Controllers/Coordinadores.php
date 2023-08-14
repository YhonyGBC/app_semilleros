<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Coordinador;
use App\Models\Usuario;

class Coordinadores extends Controller
{
    public function index() {
        $coordinadores = DB::table('coordinadores')
            ->join('semilleros', 'coordinadores.semillero_id', '=', 'semilleros.id')
            ->select('coordinadores.*', 'semilleros.nombre as nombre_semillero')
            ->get();
    
        return view('coordinadores.listado', ['coordinadores' => $coordinadores]);
    }

    public function form_creacion() {
        return view('coordinadores.form_creacion');
    }


    public function crear(Request $r) {
        $usuario = new Usuario();
        $usuario->identificacion = $r->input('identificacion');
        $usuario->clave = bcrypt($r->input('clave')); // Se utiliza bcrypt para encriptar la contraseña
        $usuario->save();
        return redirect()->route('home');
    }
        
    public function form_registro() {
        $semilleros = DB::table('semilleros')->get();
        return view('coordinadores.form_registro', ['semilleros' => $semilleros]);
    }

    public function registrar(Request $r) {
        $coordinador = new Coordinador();
        $coordinador->nombre = $r->input('nombre');
        $coordinador->identificacion = $r->input('identificacion');
        $coordinador->direccion = $r->input('direccion');
        $coordinador->telefono = $r->input('telefono');
        $coordinador->correo = $r->input('correo');
        $coordinador->genero = $r->input('genero');
        $coordinador->fecha_nacimiento = $r->input('fecha_nacimiento');
        $coordinador->prog_academico = $r->input('prog_academico');
        $coordinador->areas_conocimiento = $r->input('areas_conocimiento');
        $coordinador->semillero_id = $r->input('semillero_id');
        $coordinador->save();
        return redirect()->route('list_semilleristas');
    }
    
}