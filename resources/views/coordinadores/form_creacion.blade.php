@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    <p>Módulo de creación del usuario (coordinador, semillerista).</p>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <form action="{{url('coordinador/crear_usuario')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="identificacion">Identificación</label>
                            <input type="text" name="identificacion" id="identificacion" class="form-control" 
                                pattern="[0-9]{8,}" required>
                            <small>La identificación debe tener al menos 8 dígitos.</small>
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="password" name="clave" id="clave" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop