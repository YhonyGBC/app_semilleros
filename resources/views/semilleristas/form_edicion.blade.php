@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Información</h1>
@stop

@section('content')
    <p>Módulo de edición de información del semillerista.</p>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ url('semillerista/editar/' . $semillerista->identificacion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre"
                   value="{{ $semillerista->nombre }}" disabled>
        </div>

        <div class="mb-3">
            <label for="identificacion" class="form-label">Identificación</label>
            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Ingrese la identificación"
                   value="{{ $semillerista->identificacion }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="cod_estudiante" class="form-label">Código Estudiante</label>
            <input type="text" class="form-control" id="cod_estudiante" name="cod_estudiante" placeholder="Ingrese el código de estudiante"
                   value="{{ $semillerista->cod_estudiante }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección"
                   value="{{ $semillerista->direccion }}" required>
        </div>
        
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono"
                   value="{{ $semillerista->telefono }}" pattern="[0-9]{10}" required>
            <small>El teléfono debe tener 10 dígitos.</small>
        </div>
        
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo"
                   value="{{ $semillerista->correo }}" required>
        </div>
        
        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingrese el género"
                   value="{{ $semillerista->genero }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                   value="{{ $semillerista->fecha_nacimiento }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" class="form-control" id="semestre" name="semestre" placeholder="Ingrese el semestre"
                   value="{{ $semillerista->semestre }}" required>
        </div>
        
        <div class="mb-3">
            <label for="prog_academico" class="form-label">Programa Académico</label>
            <input type="text" class="form-control" id="prog_academico" name="prog_academico"
                   placeholder="Ingrese el programa académico" value="{{ $semillerista->prog_academico }}" required>
        </div>
        
        <div class="mb-3">
            <label for="nombre_semillero" class="form-label">Semillero</label>
            <input type="text" class="form-control" id="nombre_semillero" name="nombre_semillero"
                   placeholder="" value="{{ $semillerista->nombre_semillero }}" disabled>
        </div>
        
        <button type="submit" class="btn btn-success">Editar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
