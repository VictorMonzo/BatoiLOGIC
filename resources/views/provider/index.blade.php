@extends('plantilla')
@section('titulo', 'Listado de proveedores')
@section('contenido')

    <div class="page-providers">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Listado de proveedores</h1>
            </div>
            <div class="row py-4">
                @if(Auth::check() && (auth()->user()->type_user === 3))
                    <a class="btn btn-success" href="{{ route('provider.create') }}">+ Añadir proveedor</a>
                @endif
            </div>

            <div class="row">
                @forelse($providers as $provider)
                    <div class="p-3 mb-3 bg-white rounded box-shadow w-100">
                        <div class="media text-muted">
                            <div class="media-body pt-3 mb-0 ml-3">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <a href="{{ route('provider.show', $provider->id) }}"><strong class="text-gray-dark">Proveedor: {{ $provider->name." ".$provider->surname}}</strong></a>
                                    <a href="{{ route('provider.show', $provider->id) }}">Ver proveedor</a>
                                </div>
                                <span class="d-block"><i class="fas fa-envelope"></i> {{ $provider->email }}</span>
                                <!--span class="d-block">Tipo usuario: {{ $provider->type_user ? 'Dealer' : 'Customer' }}</span-->

                                @if(Auth::check() && (auth()->user()->type_user === 3))
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
</div>


@endsection

