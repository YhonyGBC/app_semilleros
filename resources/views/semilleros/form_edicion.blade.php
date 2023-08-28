@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Semillero</h1>
@stop

@section('content')
    <p>Módulo de edición de información del semillero.</p>

    <form action="{{ url('semillero/editar/' . $semillero->nombre) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre"
                   value="{{ $semillero->nombre }}" disabled>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo"
                   value="{{ $semillero->correo }}" required>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <br>
            @if ($semillero->logo)
                <img src="{{ asset($semillero->logo) }}" alt="Logo" style="max-width: 200px">
            @else
                <p>No hay logo disponible.</p>
            @endif
            <br>
            <input type="file" class="form-control-file mt-2" id="logo" name="logo" accept="image/*">
        </div>
        
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha"
                   value="{{ $semillero->fecha }}" disabled>
        </div>
        
        <div class="mb-3">
            <label for="num_resolucion" class="form-label">Número de Resolución</label>
            <input type="text" class="form-control" id="num_resolucion" name="num_resolucion" placeholder="Ingrese el número de resolución"
                   value="{{ $semillero->num_resolucion }}" required>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción">{{ $semillero->descripcion }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="mision" class="form-label">Misión</label>
            <textarea class="form-control" id="mision" name="mision" placeholder="Ingrese la misión">{{ $semillero->mision }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="vision" class="form-label">Visión</label>
            <textarea class="form-control" id="vision" name="vision" placeholder="Ingrese la visión">{{ $semillero->vision }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="valores" class="form-label">Valores</label>
            <textarea class="form-control" id="valores" name="valores" placeholder="Ingrese los valores">{{ $semillero->valores }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="objetivos" class="form-label">Objetivos</label>
            <textarea class="form-control" id="objetivos" name="objetivos" placeholder="Ingrese los objetivos">{{ $semillero->objetivos }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="lineas_investigacion" class="form-label">Líneas de Investigación</label>
            <textarea class="form-control" id="lineas_investigacion" name="lineas_investigacion" placeholder="Ingrese las líneas de investigación">{{ $semillero->lineas_investigacion }}</textarea>
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