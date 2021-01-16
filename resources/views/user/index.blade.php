@extends('plantilla')
@section('titulo', 'Listado de usuarios')
@section('contenido')

    <div class="page-users">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Listado de usuarios</h1>
            </div>
            <div class="row py-4">
                @if(Auth::check() && (auth()->user()->rol === 1))
                    <a class="btn btn-success" href="{{ route('user.create') }}">+ Añadir usuario</a>
                @endif
            </div>

            <div class="row">
                @forelse($users as $user)
                    <div class="p-3 mb-3 bg-white rounded box-shadow w-100">
                        <div class="media text-muted">
                            <a href="#" class="pt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#000" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </a>
                            <div class="media-body pt-3 mb-0 ml-3">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <a href="{{ route('user.show', $user->id) }}"><strong class="text-gray-dark">Usuario: {{ $user->name." ".$user->surname}}</strong></a>
                                    <a href="{{ route('user.show', $user->id) }}">Ver usuario</a>
                                </div>
                                <span class="d-block">Email: {{ $user->email }}</span>
                                <span class="d-block">Dirección: {{ $user->address }}</span>
                                <span class="d-block">Tipo usuario: {{ $user->type_user ? 'Dealer' : 'Customer' }}</span>

                                @if(Auth::check() && (auth()->user()->rol === 1))
                                    <form method="POST" action="{{  route('user.destroy', $user->id) }}" class="pt-4">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-lg btn-primary">Editar usuario</a>
                                        <button class="btn btn-lg btn-danger">Eliminar usuario</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-danger w-100" role="alert">No hay ningún usuario</div>
            </div>
            @endforelse
            {{ $users->links() }}
        </div>
    </div>


@endsection
