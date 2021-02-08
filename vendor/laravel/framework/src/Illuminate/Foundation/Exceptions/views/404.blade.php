@extends('plantilla')
@section('titulo', __('Página no encontrada'))
@section('contenido')
    <div class="page-404 container my-auto p-5" style="height: 70vh; display: flex; flex-direction: column; justify-content: center;">
        <div class="text-center py-5">
            <h1 class="display-2">404</h1>
            <h2>Página no encontrada</h2>
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg mt-5">Ir a inicio</a>
        </div>
    </div>
@endsection
