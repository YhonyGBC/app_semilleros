@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proyectos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col">
            <p>Listado de Proyectos</p>
        </div>
        <div class="col-md-auto">
            <a class="btn btn-success" href="/proyectos/reportPDF">Generar Reporte</a>
        </div>
    </div>
    <br><br>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Título</th>
        <th scope="col">Integrantes</th>
        <th scope="col">Tipo</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Inicio</th>
        <th scope="col">Fecha Final</th>
        <th scope="col">Documento</th>
        <th scope="col">Semillero</th>
        <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $num => $p)
        <tr>
        <!-- <th scope="row">{{ $num + 1}}</th> -->
        <td>{{ $p->id}}</td>
        <td>{{ $p->titulo}}</td>
        <td>{{ $p->participante}}</td>
        <td>{{ $p->tipo_proyecto}}</td>
        <td>{{ $p->estado}}</td>
        <td>{{ $p->fecha_inicio}}</td>
        <td>{{ $p->fecha_finalizacion}}</td>
        <td>{{ $p->archivo_adjunto}}</td>
        <td>{{ $p->semillero->nombre}}</td>
        <td>
        <a class="btn btn-primary" href="{{route('editaProy',$p->id)}}">Editar</a>
        <a class="btn btn-danger" href="{{route('eliminaProy',$p->id)}}">Eliminar</a>
        </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@stop