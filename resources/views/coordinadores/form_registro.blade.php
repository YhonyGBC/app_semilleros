@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar Información</h1>
@stop

@section('content')
    <p>Módulo de registro de información del coordinador.</p>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <form action="{{url('coordinador/registrar_info')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="identificacion">Identificación</label>
                            <input type="text" class="form-control" id="identificacion" name="identificacion" 
                                pattern="[0-9]{8,}" required>
                            <small>La identificación debe tener al menos 8 dígitos.</small>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                pattern="[0-9]{10}">
                            <small>El teléfono debe tener 10 dígitos.</small>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select class="form-control" id="genero" name="genero">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>

                        <div class="form-group">
                            <label for="prog_academico">Programa Académico</label>
                            <input type="text" class="form-control" id="prog_academico" name="prog_academico">
                        </div>

                        <div class="form-group">
                            <label for="areas_conocimiento">Áreas de Conocimiento</label>
                            <textarea class="form-control" id="areas_conocimiento" name="areas_conocimiento" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="semillero_id">Semillero</label>
                            <select class="form-control" id="semillero_id" name="semillero_id" required>
                                <option value="">Seleccione un semillero</option>
                                @foreach($semilleros as $semillero)
                                    <option value="{{ $semillero->id }}">{{ $semillero->nombre }}</option>
                                @endforeach 
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Registrar</button>
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