@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Evento</h1>


@stop

@section('content')
    <form class="row g-3" action="{{url('eventos/registrar')}}" method="POST" onsubmit="formCheck(this); return false;">
        @csrf
        <div class="col-md-6">
            <label for="inputName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="inputName" name="inputName">
        </div>
        <div class="col-md-6">
            <label for="inputDesc" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="inputDesc" name="inputDesc">
        </div>
        <div class="col-md-3">
            <label for="imputDate" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="imputDate" name="imputDate">
        </div>
        <div class="col-md-5">
            <label for="inputLugar" class="form-label">Lugar</label>
            <input type="text" class="form-control" id="inputLugar" name="inputLugar">
        </div>
        <div class="col-4">
            <label for="imputTipo_event" class="form-label">Tipo</label>
            <select class="form-select" id="imputTipo_event" name="imputTipo_event">
                <option value="Null" selected>Seleccione</option>
                <option value="Congreso">Congreso</option>
                <option value="Encuentro">Encuentro</option>
                <option value="Seminario">Seminario</option>
                <option value="Seminario">Taller</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="imputModalidad" class="form-label">Modalidad</label>
            <select class="form-select" id="imputModalidad" name="imputModalidad">
                <option value="Null" selected>Seleccione</option>
                <option value="Virtual">Virtual</option>
                <option value="Presencial">Presencial</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="imputClas" class="form-label">Clasificación</label>
            <select class="form-select" id="imputClas" name="imputClas">
                <option value="Null" selected>Seleccione</option>
                <option value="Local">Local</option>
                <option value="Regional">Regional</option>
                <option value="Nacional">Nacional</option>
                <option value="Internacional">Internacional</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputObs" class="form-label">Observaciones</label>
            <input type="text" class="form-control" id="inputObs" name="inputObs">
        </div>
        <br><br><br>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js_event/fun_event.js') }}"></script>
@stop