@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar Información</h1>
@stop

@section('content')
    <p>Módulo de registro de información del semillero.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <form action="{{url('semillero/registrar_info')}}" method="POST" enctype="multipart/form-data">
                        @csrf
 
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control-file" id="logo" name="logo">
                        </div>

                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>

                        <div class="form-group">
                            <label for="num_resolucion">Número de Resolución</label>
                            <input type="text" class="form-control" id="num_resolucion" name="num_resolucion">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="mision">Misión</label>
                            <textarea class="form-control" id="mision" name="mision" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="vision">Visión</label>
                            <textarea class="form-control" id="vision" name="vision" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="valores">Valores</label>
                            <textarea class="form-control" id="valores" name="valores" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="objetivos">Objetivos</label>
                            <textarea class="form-control" id="objetivos" name="objetivos" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="lineas_investigacion">Líneas de Investigación</label>
                            <textarea class="form-control" id="lineas_investigacion" name="lineas_investigacion" rows="3"></textarea>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('logo').addEventListener('change', function () {
                if (this.files.length > 0) {
                    console.log('Imagen de logo recibida correctamente');
                } else {
                    console.log('No se recibió ninguna imagen de logo');
                }
            });
        });
    </script>
@stop