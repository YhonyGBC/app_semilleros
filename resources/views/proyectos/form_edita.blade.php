@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Proyecto</h1>


@stop

@section('content')
    <form class="row g-3" action="{{route('actualizar_Proy', $proyecto->id)}}" method="POST" enctype="multipart/form-data" onsubmit="checkForm(this); return false;">
        @csrf
        <div class="col-md-10">
            <label for="inputTitle" class="form-label">Título</label>
            <input type="text" class="form-control" id="inputTitle" name="inputTitle">
        </div>
        <div class="col-md-2">
            <label for="inputInte" class="form-label">Integrantes</label>
            <select class="form-select" id="inputInte" name="inputInte">
                <option value="Null" selected>Seleccione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="col-4">
            <label for="inputTipo" class="form-label">Tipo de proyecto</label>
            <select class="form-select" id="inputTipo" name="inputTipo">
                <option value="Null" selected>Seleccione</option>
                <option value="Investigacion">Investigación</option>
                <option value="Innovacion y Desarrollo">Innovación y Desarrollo</option>
                <option value="Emprendimiento">Emprendimiento</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="inputEstado" class="form-label">Estado</label>
            <select class="form-select" id="inputEstado" name="inputEstado">
                <option value="Null" selected>Seleccione</option>
                <option value="Propuesta">Propuesta</option>
                <option value="En Curso">En Curso</option>
                <option value="Finalizado">Finalizado</option>
            </select>
        </div>
        <div class="col-md-5">
            <label for="inputZip" class="form-label">Documento</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" accept=".pdf" class="custom-file-input" id="archivo" name="archivo">
                    <label class="custom-file-label" for="archivo" id="archivoLabel">Seleccionar archivo</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <label for="inputDate_Ini" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="inputDate_Ini" name="inputDate_Ini">
        </div>
        <div class="col-md-3">
            <label for="inputDate_Fin" class="form-label">Fecha de Finalización</label>
            <input type="date" class="form-control" id="inputDate_Fin" name="inputDate_Fin">
        </div>
        <div class="col-md-6">
            <label for="inputSemillero" class="form-label">Semillero</label>
            <select class="form-select" id="inputSemillero" name="inputSemillero">
                <option value="Null" selected>Seleccione</option>
                @foreach ($semilleros as $semillero)
                <option value="{{ $semillero->id }}">{{ $semillero->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlTextarea1" class="form-label">Estudiantes</label>
            <input type="text" class="form-control" id="selectedStudentsTextArea" name="selected_students" readonly>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Añadir</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Código Estudiante</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Programa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semilleristas as $semillerista)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $semillerista->nombre }}" id="flexCheckDefault">
                    </td>
                    <td>{{ $semillerista->nombre }}</td>
                    <td>{{ $semillerista->identificacion }}</td>
                    <td>{{ $semillerista->cod_estudiante }}</td>
                    <td>{{ $semillerista->telefono }}</td>
                    <td>{{ $semillerista->correo }}</td>
                    <td>{{ $semillerista->semestre }}</td>
                    <td>{{ $semillerista->prog_academico }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br><br>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
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
    <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var label = document.getElementById('archivoLabel');
            label.innerText = fileName;
        });
    </script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        var $selectedStudents = $("input[type='checkbox']");
        var $selectIntegrantes = $("#inputInte");
        var $selectedStudentsTextArea = $("#selectedStudentsTextArea");

        $selectedStudents.prop('disabled', true); // Deshabilitar inicialmente los checkboxes

        $selectIntegrantes.on('change', function() {
            var cantidadElegida = parseInt($(this).val());
            $selectedStudents.prop('checked', false).prop('disabled', true);
            $selectedStudentsTextArea.val(""); // Limpiar el campo de texto

            if (cantidadElegida > 0) {
                $selectedStudents.prop('disabled', false); // Habilitar checkboxes si el número es válido
            }

            $selectedStudents.off(); // Eliminar eventos previos para evitar duplicados

            $selectedStudents.on('change', function() {
                var estudiantesSeleccionados = $selectedStudents.filter(':checked');

                if (estudiantesSeleccionados.length >= cantidadElegida) {
                    $selectedStudents.not(':checked').prop('disabled', true);
                } else {
                    $selectedStudents.prop('disabled', false);
                }

                var selectedStudentNames = estudiantesSeleccionados.map(function() {
                    return $(this).val();
                }).get().join(', ');

                $selectedStudentsTextArea.val(selectedStudentNames);
            });
        });
    });
    </script>

    <script src="{{ asset('js/funciones.js') }}"></script>
@stop