@extends('plantilla')
@section('titulo', 'Crear usuario')
@section('contenido')
    <div class="page-create-comanda">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Nuevo usuario</h1>
            </div>

            <div class="row py-4">
                <a href="{{ route('user.index') }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('user.store') }}" method='POST' class="w-100">
                    @csrf
                    <p>Nombre: </p>
                    <input type="text" class="form-control" id="name" name="name">

                    <p>Apellidos: </p>
                    <input type="text" class="form-control" id="surname" name="surname">

                    <p>Email: </p>
                    <input type="email" class="form-control" id="email" name="email">

                    <p>Dirección: </p>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>

                    <p>Contraseña: </p>
                    <input type="password" class="form-control" id="password" name="password">

                    <p>Rol: </p>
                    <select class="form-control" id="rol" name="rol">

                            <option value="0">Común</option>
                            <option value="1">Administrador</option>

                    </select>

                    <p>Tipo usuario: </p>
                    <select class="form-control" id="type_user" name="type_user">

                            <option value="0">Customer</option>
                            <option value="1">Dealer</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Crear usuario</button>
                </form>
            </div>
        </div>
    </div>
@endsection
