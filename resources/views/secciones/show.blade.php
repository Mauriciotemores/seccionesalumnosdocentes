@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sección: {{ $seccion->nombre }}</h1>
    <p>Código: {{ $seccion->codigo }}</p>

    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Alumnos Inscritos</h2>
            @if($alumnosInscritos->isEmpty())
                <div class="alert alert-info">No hay alumnos inscritos</div>
            @else
                <ul class="list-group">
                    @foreach($alumnosInscritos as $alumno)
                        <li class="list-group-item">{{ $alumno->nombre }} ({{ $alumno->matricula }})</li>
                    @endforeach
                </ul>
            @endif

            <h3 class="mt-4">Inscribir Alumnos</h3>
            <form action="{{ route('secciones.asignar-alumnos', $seccion) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="alumnos">Seleccionar Alumnos</label>
                    <select name="alumnos[]" id="alumnos" class="form-control" multiple>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}" 
                                {{ $seccion->alumnos->contains($alumno->id) ? 'selected' : '' }}>
                                {{ $alumno->nombre }} ({{ $alumno->matricula }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Guardar Inscripciones</button>
            </form>
        </div>

        <div class="col-md-6">
            <h2>Docentes Asignados</h2>
            @if($docentesAsignados->isEmpty())
                <div class="alert alert-info">No hay docentes asignados</div>
            @else
                <ul class="list-group">
                    @foreach($docentesAsignados as $docente)
                        <li class="list-group-item">{{ $docente->nombre }} ({{ $docente->cedula }})</li>
                    @endforeach
                </ul>
            @endif

            <h3 class="mt-4">Asignar Docentes</h3>
            <form action="{{ route('secciones.asignar-docentes', $seccion) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="docentes">Seleccionar Docentes</label>
                    <select name="docentes[]" id="docentes" class="form-control" multiple>
                        @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}" 
                                {{ $seccion->docentes->contains($docente->id) ? 'selected' : '' }}>
                                {{ $docente->nombre }} ({{ $docente->cedula }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Guardar Asignación</button>
            </form>
        </div>
    </div>
</div>
@endsection
