@extends('plantilla')
@section('titulo', 'Ver usuario')
@section('contenido')

    <div class="page-users">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Información del usuario</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>


            <div class="row py-4">
                <div class="col-12 col-lg-4 bg-white mb-3 rounded box-shadow d-flex flex-column justify-content-center">
                    <span class="mr-3 text-center">
                        <img src="{{ $user[0]->photo ? asset($user[0]->photo) : 'https://via.placeholder.com/300' }}" alt="Product image" width="300" height="300" style="object-fit: cover">
                        <h1 class="mt-4 pb-3"><b>{{ $user[0]->name }}</b> {{ $user[0]->surname }}</h1>
                    </span>
                </div>

                <div class="col-12 col-lg-8" style="height: 100%">
                    <div class="pl-4 bg-white rounded box-shadow p-5">
                        <p><b>Nombre:</b> {{ $user[0]->name }}</p>
                        <p><b>Apellidos:</b> {{ $user[0]->surname }}</p>
                        <p><b>Email:</b> {{ $user[0]->email }}</p>
                        <p><b>Dirección:</b> {{ $user[0]->address }}</p>
                        <p><b>Tipo de usuario:</b> {{ $user[0]->type_users->name }}</p>

                        @if(Auth::check() && (auth()->user()->type_user === 3 || auth()->user()->id === $user[0]->id))
                            <form method="POST" action="{{  route('user.destroy', $user[0]->id) }}" class="pt-4">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('user.edit', $user[0]->id) }}" class="btn btn-lg btn-primary">Editar usuario</a>
                                <button class="btn btn-lg btn-danger">Eliminar usuario</button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>

            <div class="row pt-5">
                <h2>{{ $user[0]->type_user === 2 ? 'Listado de comandas repartidas' : 'Lista de comandas'}}</h2>
            </div>
            <div class="row">
                @forelse($orders as $order)
                    <div class="p-3 mb-5 bg-white rounded box-shadow w-100">
                        <div class="media text-muted">
                            <div class="media-body mb-0">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <a href="#"><strong class="text-gray-dark">Estado: {{ $order->states->name }}</strong></a>
                                    <a href="{{ route('order.show', $order->id) }}">Ver comanda</a>
                                </div>
                                <span class="d-block">Dirección: {{ $order->address }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger w-100" role="alert">
                        No hay comandas
                    </div>
                @endforelse
            </div>
            {{ $orders->links() }}
            </div>
        </div>
    </div>

@endsection
