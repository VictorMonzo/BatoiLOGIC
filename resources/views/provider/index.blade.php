@extends('plantilla')
@section('titulo', 'Listado de proveedores')
@section('contenido')

    <div class="page-providers">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Listado de proveedores</h1>
            </div>
            <div class="row py-4">
                @if(Auth::check() && (auth()->user()->rol === 1 || auth()->user()->type_user === 1))
                    <a class="btn btn-success" href="{{ route('provider.create') }}">+ Añadir proveedor</a>
                @endif
            </div>

            <div class="row">
                @forelse($providers as $provider)
                    <div class="p-3 mb-3 bg-white rounded box-shadow w-100">
                        <div class="media text-muted">
                            <a href="{{ route('provider.show', $provider->id) }}" class="pt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#000" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </a>
                            <div class="media-body pt-3 mb-0 ml-3">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <a href="{{ route('provider.show', $provider->id) }}"><strong class="text-gray-dark">Nombre: {{ $provider->name." ".$provider->surname}}</strong></a>
                                    <a href="{{ route('provider.show', $provider->id) }}">Ver proveedor</a>
                                </div>
                                <span class="d-block">Email: {{ $provider->email }}</span>
                                <span class="d-block">Tipo usuario: {{ $provider->type_user ? 'Dealer' : 'Customer' }}</span>

                                @if(Auth::check() && (auth()->user()->rol === 1))
                                    <form method="POST" action="{{  route('provider.destroy', $provider->id) }}" class="pt-4">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('provider.edit', $provider->id) }}" class="btn btn-lg btn-primary">Editar proveedor</a>
                                        <button class="btn btn-lg btn-danger">Eliminar proveedor</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger w-100" role="alert">No hay ningún proveedor</div>
            </div>
            @endforelse
            {{ $providers->links() }}
        </div>
    </div>


@endsection

