@extends('plantilla')
@section('titulo', 'Ver proveedor')
@section('contenido')

    <div class="page-users">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Información del proveedor</h1>
            </div>

            <div class="row py-4">
                <a href="{{ route('provider.index') }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>


            <div class="row py-4">
                <div class="col-4 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datos de {{ $provider[0]->name }}</h5>
                            <p class="card-text">Email: {{ $provider[0]->email }}</p>

                            @if(Auth::check() && (auth()->user()->rol === 1 || auth()->user()->type_user === 1))

                                <form method="POST" action="{{  route('provider.destroy', $provider[0]->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('provider.edit', $provider[0]->id) }}" class="btn btn-lg btn-primary">Editar proveedor</a>
                                    <button class="btn btn-lg btn-danger">Borrar</button>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-5">
                <h2>Productos del proveedor</h2>
            </div>
            <div class="row">
                @forelse($productos as $product)
                    <div class="p-3 mb-5 bg-white rounded box-shadow w-100">
                        <div class="media text-muted">
                            <div class="media-body mb-0">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <a href="#"><strong class="text-gray-dark">Producto: {{ $product->name }}</strong></a>
                                    <a href="#">Ver producto</a>
                                </div>
                                <span class="d-block">Cantidad: {{ $product->description }}</span>
                                <span class="d-block">Cantidad: {{ $product->stock }}</span>
                                <span class="d-block">Precio: {{ $product->price }}</span>
                                <span class="d-block">Activo: {{ $product->active ? 'Sí' : 'No' }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger w-100" role="alert">
                        No hay productos
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection


