@extends('plantilla')
@section('titulo', 'Añadir proveedor')
@section('contenido')
    <div class="page-create-comanda">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Nuevo proveedor</h1>
            </div>

            <div class="row py-4">
                <a href="{{ route('provider.index') }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('provider.store') }}" method='POST' class="w-100">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Crear proveedor</button>
                </form>
            </div>
        </div>
    </div>
@endsection
