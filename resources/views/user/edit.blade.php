@extends('plantilla')
@section('titulo', 'Editar usuario')
@section('contenido')

    <div class="page-edit-user">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Editar usuario</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('user.update', $user[0]->id) }}" method='POST' class="w-100" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name">Nombre: </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user[0]->name }}" required>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="surname">Apellidos: </label>
                                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user[0]->surname }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user[0]->email }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Cambiar contraseña: </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo">Foto de perfil: </label>
                        <input id="file-input" name="photo" type="file" class="form-control" accept="image/gif,image/jpeg,image/jpg,image/png"/>
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección: </label>
                        <textarea class="form-control" id="address" name="address" rows="3" required>{{ $user[0]->address }}</textarea>
                    </div>

                    @if($user[0]->type_user === 3)
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="type_user">Tipo usuario: </label>
                                    <select class="form-control" id="type_user" name="type_user" required>
                                        <option value="{{ $user[0]->type_user }}"> {{ $user[0]->type_users->name }} (Actual)</option>
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
                        <input id="type_user" name="type_user" type="hidden" value="{{ $user[0]->type_user }}">
                    @endif
                    <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                </form>
            </div>
        </div>
    </div>

@endsection
