@extends('plantilla')
@section('titulo', 'Editar proveedor')
@section('contenido')

    <div class="page-edit-provider">
        <div class="container my-5">

            <div class="row pt-5">
                <h1>Editar proveedor</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('provider.update', $provider[0]->id) }}" method='POST' class="w-100">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $provider[0]->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $provider[0]->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar comanda</button>
                </form>
            </div>
        </div>
    </div>

@endsection
