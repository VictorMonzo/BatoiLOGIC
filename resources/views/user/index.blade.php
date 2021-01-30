@extends('plantilla')
@section('titulo', 'Listado de usuarios')
@section('contenido')
    <div class="page-users">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Listado de usuarios</h1>
            </div>
            <div class="row py-4">
                @if(Auth::check() && (auth()->user()->type_user === 3))
                    <a class="btn btn-success" href="{{ route('user.create') }}">+ Añadir usuario</a>
                @endif
            </div>

            <div class="row">
                @forelse($users as $user)
                    <div class="p-3 mb-3 bg-white rounded box-shadow w-100">
                        <div class="media text-muted">
                            <a href="{{ route('user.show', $user->id) }}" class="pt-3">
                                <img src="{{ $user->photo ? asset($user->photo): 'https://via.placeholder.com/300' }}" class="rounded-circle" height="100" width="100" style="object-fit: cover">
                            </a>
                            <div class="media-body pt-3 mb-0 ml-3">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    @if(auth()->user()->id === $user->id || auth()->user()->type_user === 3)
                                        <a href="{{ route('user.show', $user->id) }}"><strong class="text-gray-dark">{{ $user->name." ".$user->surname}}</strong></a>
                                        <a href="{{ route('user.show', $user->id) }}" class="d-none d-md-block">Ver usuario</a>
                                    @else
                                        <a href="#"><strong class="text-gray-dark">{{ $user->name." ".$user->surname}}</strong></a>
                                    @endif
                                </div>
                                <span class="d-block"><i class="fas fa-envelope"></i> {{ $user->email }}</span>
                                <span class="d-block"><i class="fas fa-map-marker-alt"></i> {{ $user->address }}</span>
                                <span class="d-block"> {{ $user->type_users->name }}</span>
                            </div>
                        </div>
                        <div class="row pl-4">
                            @if(Auth::check() && (auth()->user()->type_user === 3 || auth()->user()->id === $user->id))
                                <form method="POST" action="{{  route('user.destroy', $user->id) }}" class="pt-4">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Editar usuario</a>
                                    <button class="btn btn-danger">Eliminar usuario</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-danger w-100" role="alert">No hay ningún usuario</div>
            </div>
            @endforelse
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
