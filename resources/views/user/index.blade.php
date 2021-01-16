@extends('plantilla')
@section('titulo', 'Listado de usuarios')
@section('contenido')

    <h1>Usuarios</h1>

    @forelse($users as $user)
        <p>----------------------------------------------------</p>
        <p>Nombre usuario: {{ $user->name." ".$user->surname}}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Dirección: {{ $user->address }}</p>
        <p>Tipo usuario: {{ $user->type_user ? 'Dealer' : 'Customer' }}</p>

        <a href="" class="btn btn-lg btn-primary">Ver usuario</a>

        @if(Auth::check() && (auth()->user()->rol === 1))

            <form method="POST" action="{{  route('user.destroy', $user->id) }}">
                @method('DELETE')
                @csrf
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-lg btn-primary">Editar usuario</a>
                <button class="btn btn-lg btn-danger">Eliminar usuario</button>
            </form>
        @endif
    @empty
        <div class="alert alert-danger" role="alert">
            No hay ninguna usuario
        </div>
    @endforelse
    {{ $users->links() }}
@endsection
