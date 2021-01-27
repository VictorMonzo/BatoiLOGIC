@extends('plantilla')
@section('titulo', 'Crear usuario')
@section('contenido')
    <div class="page-create-user">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Nuevo usuario</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('user.store') }}" method='POST' class="w-100" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Nombre: </label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="surname">Apellidos: </label>
                                <input type="text" class="form-control" id="surname" name="surname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Contraseña: </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto de perfil: </label>
                        <input id="file-input" name="photo" type="file" class="form-control" accept="image/gif,image/jpeg,image/jpg,image/png" required/>
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección: </label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    @if(Auth::check())
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="type_user">Tipo usuario: </label>
                                    <select class="form-control" id="type_user" name="type_user" required>
                                        <option value="">Seleccione el tipo de usuario</option>
                                        @forelse($type_users as $type_users)
                                            <option value="{{ $type_users->id }}">{{ $type_users->name }}</option>
                                        @empty
                                            <option value="">No hay tipos de usuarios</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                    @else
                        <input type="hidden" id="type_user" name="type_user" value="0">
                        <input type="hidden" id="type_register" name="type_register" value="0">
                    @endif

                    <button type="submit" class="btn btn-primary">Crear usuario</button>
                </form>
            </div>
        </div>
    </div>
@endsection
