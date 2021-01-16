@extends('plantilla')
@section('titulo', 'Editar usuario')
@section('contenido')

    <div class="page-create-comanda">
        <div class="container my-5">

            <div class="row pt-5">
                <h1>Editar usuario</h1>
            </div>

            <div class="row py-4">
                <a href="{{ route('user.index') }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('user.update', $user[0]->id) }}" method='POST' class="w-100">
                    @method('PUT')
                    @csrf
                    <p>Nombre: </p>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user[0]->name }}">

                    <p>Apellidos: </p>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ $user[0]->surname }}">

                    <p>Email: </p>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user[0]->email }}">

                    <p>Dirección: </p>
                    <textarea class="form-control" id="address" name="address" rows="3">{{ $user[0]->address }}</textarea>

                    <p>Rol: </p>
                    <select class="form-control" id="rol" name="rol">
                        @if($user[0]->rol)
                            <option value="0">Común</option>
                            <option value="1" selected>Administrador</option>
                        @else
                            <option value="0" selected>Común</option>
                            <option value="1">Administrador</option>
                        @endif
                    </select>

                    <p>Tipo usuario: </p>
                    <select class="form-control" id="type_user" name="type_user">
                        @if($user[0]->type_user)
                            <option value="0">Customer</option>
                            <option value="1" selected>Dealer</option>
                        @else
                            <option value="0" selected>Customer</option>
                            <option value="1">Dealer</option>
                        @endif
                    </select>


                    <button type="submit" class="btn btn-success">Actualizar usuario</button>
                </form>
            </div>
        </div>
    </div>
@endsection
