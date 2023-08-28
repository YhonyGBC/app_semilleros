<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Semillerista;
use App\Models\Usuario;
 
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
        $identificacion = $r->input('identificacion');
        $cod_estudiante = $r->input('cod_estudiante');
        $telefono = $r->input('telefono');
        $correo = $r->input('correo');

        // Primera validación
        $existenciaIdentificacion = Usuario::where('identificacion', $identificacion)->exists();
        if (!$existenciaIdentificacion) {
            return redirect()->back()->with('error', 'No existe ningún usuario con esa identificación.');
        }

        // Segundas validaciones
        $existenciaIdentificacion = Semillerista::where('identificacion', $identificacion)->exists();
        $existenciaCodEstudiante = Semillerista::where('cod_estudiante', $cod_estudiante)->exists();
        $existenciaTelefono = Semillerista::where('telefono', $telefono)->exists();
        $existenciaCorreo = Semillerista::where('correo', $correo)->exists();

        if ($existenciaIdentificacion) {
            return redirect()->back()->with('error', 'La identificación ya está registrada.');
        }

        if ($existenciaCodEstudiante) {
            return redirect()->back()->with('error', 'El código de estudiante ya está registrado.');
        }

        if ($existenciaTelefono) {
            return redirect()->back()->with('error', 'El teléfono ya está registrado.');
        }

        if ($existenciaCorreo) {
            return redirect()->back()->with('error', 'El correo ya está registrado.');
        }


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

    public function eliminar($id){
        $semillerista = Semillerista::findOrFail($id);
        $semillerista->delete();
        return redirect()->route('list_semilleristas');
    }

    public function form_edicion($identificacion) {
        $semillerista = Semillerista::where('identificacion', $identificacion)
        ->join('semilleros', 'semilleristas.semillero_id', '=', 'semilleros.id')
        ->select('semilleristas.*', 'semilleros.nombre as nombre_semillero')
        ->first();

        if (!$semillerista) { 
            return redirect()->route('list_semilleristas');
        }

        return view('semilleristas.form_edicion', compact('semillerista'));
    }

    public function editar(Request $r, $identificacion) {
        $semillerista = Semillerista::where('identificacion', $identificacion)
        ->join('semilleros', 'semilleristas.semillero_id', '=', 'semilleros.id')
        ->select('semilleristas.*', 'semilleros.nombre as nombre_semillero')
        ->first();

        $telefonoNuevo = $r->input('telefono');
        $correoNuevo = $r->input('correo');

        if ($telefonoNuevo !== $semillerista->telefono) {
            $existenciaTelefono = Semillerista::where('telefono', $telefonoNuevo)->exists();
            if ($existenciaTelefono) {
                return redirect()->back()->with('error', 'El teléfono ya está registrado.');
            }
        }

        if ($correoNuevo !== $semillerista->correo) {
            $existenciaCorreo = Semillerista::where('correo', $correoNuevo)->exists();
            if ($existenciaCorreo) {
                return redirect()->back()->with('error', 'El correo ya está registrado.');
            }
        }

        if(!$semillerista) {
            return redirect()->route('list_semilleristas');
        }

        $r->validate([
            // 'nombre' => 'required',
            // 'identificacion' => 'required',
            // 'cod_estudiante' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            // 'genero' => 'required',
            // 'fecha_nacimiento' => 'required',
            'semestre' => 'required',
            'prog_academico' => 'required',
            // 'nombre_semillero' => 'required',
        ]);

        // $semillerista->nombre = $r->input('nombre');
        // $semillerista->identificacion = $r->input('identificacion');
        // $semillerista->cod_estudiante = $r->input('cod_estudiante');
        $semillerista->direccion = $r->input('direccion');
        $semillerista->telefono = $r->input('telefono');
        $semillerista->correo = $r->input('correo');
        // $semillerista->genero = $r->input('genero');
        // $semillerista->fecha_nacimiento = $r->input('fecha_nacimiento');
        $semillerista->semestre = $r->input('semestre');
        $semillerista->prog_academico = $r->input('prog_academico');
        // $semillerista->semillero = $r->input('nombre_semillero'); 

        $semillerista->save();
    
        return redirect()->route('list_semilleristas');
    }
}
