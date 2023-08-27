@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Información</h1>
@stop

@section('content')
    <p>Módulo de edición de información del coordinador.</p>

    <form action="{{ url('coordinador/editar/' . $coordinador->identificacion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre"
                   value="{{ $coordinador->nombre }}" disabled>
        </div>

        <div class="mb-3">
            <label for="identificacion" class="form-label">Identificación</label>
            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Ingrese la identificación"
                   value="{{ $coordinador->identificacion }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección"
                   value="{{ $coordinador->direccion }}" required>
        </div>
        
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono"
                   value="{{ $coordinador->telefono }}" required>
        </div>
        
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo"
                   value="{{ $coordinador->correo }}" required>
        </div>
        
        <div class="mb-3">
            <label for="genero" class="form-label">Género</label>
            <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingrese el género"
                   value="{{ $coordinador->genero }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                   value="{{ $coordinador->fecha_nacimiento }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="prog_academico" class="form-label">Programa Académico</label>
            <input type="text" class="form-control" id="prog_academico" name="prog_academico"
                   placeholder="Ingrese el programa académico" value="{{ $coordinador->prog_academico }}" required>
        </div>
        
        <div class="mb-3">
            <label for="areas_conocimiento" class="form-label">Áreas de Conocimiento</label>
            <textarea class="form-control" id="areas_conocimiento" name="areas_conocimiento"
                      placeholder="Ingrese las áreas de conocimiento">{{ $coordinador->areas_conocimiento }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="nombre_semillero" class="form-label">Semillero</label>
            <input type="text" class="form-control" id="nombre_semillero" name="nombre_semillero"
                   placeholder="Ingrese el programa académico" value="{{ $coordinador->nombre_semillero }}" disabled>
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
