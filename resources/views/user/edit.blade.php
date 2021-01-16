@extends('plantilla')
@section('titulo', 'Editar usuario')
@section('contenido')
    <h1>Editar usuario</h1>
    {{ $user[0]->id }}
@endsection
