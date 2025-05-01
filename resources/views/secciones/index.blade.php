@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Secciones</h1>
    
    <div class="list-group mt-4">
        @foreach($secciones as $seccion)
            <a href="{{ route('secciones.show', $seccion) }}" class="list-group-item list-group-item-action">
                {{ $seccion->nombre }} ({{ $seccion->codigo }})
            </a>
        @endforeach
    </div>
</div>
@endsection
