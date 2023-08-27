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
        $identificacion = $r->input('identificacion');

        $existenciaIdentificacion = Usuario::where('identificacion', $identificacion)->exists();

        if ($existenciaIdentificacion) {
            return redirect()->back()->with('error', 'La identificación ya está registrada.');
        }

        $usuario = new Usuario();
        $usuario->identificacion = $r->input('identificacion');
        $usuario->clave = bcrypt($r->input('clave')); // Se utiliza bcrypt para encriptar la contraseña
        $usuario->save();
        return redirect()->route('regist_coordinador');
    }
        
    public function form_registro() {
        $semilleros = DB::table('semilleros')->get();
        return view('coordinadores.form_registro', ['semilleros' => $semilleros]);
    }

    public function registrar(Request $r) {
        $identificacion = $r->input('identificacion');
        $telefono = $r->input('telefono');
        $correo = $r->input('correo');

        $existenciaIdentificacion = Coordinador::where('identificacion', $identificacion)->exists();
        $existenciaTelefono = Coordinador::where('telefono', $telefono)->exists();
        $existenciaCorreo = Coordinador::where('correo', $correo)->exists();

        if ($existenciaIdentificacion) {
            return redirect()->back()->with('error', 'La identificación ya está registrada.');
        }

        if ($existenciaTelefono) {
            return redirect()->back()->with('error', 'El teléfono ya está registrado.');
        }

        if ($existenciaCorreo) {
            return redirect()->back()->with('error', 'El correo ya está registrado.');
        }
        
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
        return redirect()->route('list_coordinadores');
    }

    public function eliminar($id){
        $coordinador = Coordinador::findOrFail($id);
        $coordinador->delete();
        return redirect()->route('list_coordinadores');
    }

    public function form_edicion($identificacion) {
        $coordinador = Coordinador::where('identificacion', $identificacion)
        ->join('semilleros', 'coordinadores.semillero_id', '=', 'semilleros.id')
        ->select('coordinadores.*', 'semilleros.nombre as nombre_semillero')
        ->first();

        if (!$coordinador) { 
            return redirect()->route('list_coordinadores');
        }

        return view('coordinadores.form_edicion', compact('coordinador'));
    }
    
    public function editar(Request $r, $identificacion) {
        $coordinador = Coordinador::where('identificacion', $identificacion)
        ->join('semilleros', 'coordinadores.semillero_id', '=', 'semilleros.id')
        ->select('coordinadores.*', 'semilleros.nombre as nombre_semillero')
        ->first();

        $telefonoNuevo = $r->input('telefono');
        $correoNuevo = $r->input('correo');

        if ($telefonoNuevo !== $coordinador->telefono) {
            $existenciaTelefono = Coordinador::where('telefono', $telefonoNuevo)->exists();
            if ($existenciaTelefono) {
                return redirect()->back()->with('error', 'El teléfono ya está registrado.');
            }
        }

        if ($correoNuevo !== $coordinador->correo) {
            $existenciaCorreo = Coordinador::where('correo', $correoNuevo)->exists();
            if ($existenciaCorreo) {
                return redirect()->back()->with('error', 'El correo ya está registrado.');
            }
        }

        if(!$coordinador) {
            return redirect()->route('list_coordinadores');
        }

        $r->validate([
            // 'nombre' => 'required',
            // 'identificacion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            // 'genero' => 'required',
            // 'fecha_nacimiento' => 'required',
            'prog_academico' => 'required',
            // 'areas_conocimiento' => 'required',
            // 'nombre_semillero' => 'required',
        ]);

        // $coordinador->nombre = $r->input('nombre');
        // $coordinador->identificacion = $r->input('identificacion');
        $coordinador->direccion = $r->input('direccion');
        $coordinador->telefono = $r->input('telefono');
        $coordinador->correo = $r->input('correo');
        // $coordinador->genero = $r->input('genero');
        // $coordinador->fecha_nacimiento = $r->input('fecha_nacimiento');
        $coordinador->prog_academico = $r->input('prog_academico');
        $coordinador->areas_conocimiento = $r->input('areas_conocimiento');
        // $coordinador->semillero = $r->input('nombre_semillero'); 

        $coordinador->save();
    
        return redirect()->route('list_coordinadores');
    }
}
