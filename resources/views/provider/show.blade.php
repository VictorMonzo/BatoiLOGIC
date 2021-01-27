@extends('plantilla')
@section('titulo', 'Ver proveedor')
@section('contenido')
    <div class="page-users">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Información del proveedor</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <div class="col mb-5">
                    <div class="card p-3">
                        <div class="card-body">
                            <h1 class="card-title text-danger"><i class="fas fa-store"></i> {{ $provider[0]->name }}</h1>
                            <h5 class="mt-5"><i class="fas fa-envelope"></i> {{ $provider[0]->email }}</h5>

                            @if(Auth::check() && (auth()->user()->type_user === 3))

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

            <div class="row pt-5">
                @forelse($productos as $product)

                    <div class="col-12 col-md-6 col-lg-4 mb-5">
                        <div class="card product">
                            <a href="{{ route('product.show', $product->id) }}"><img src="{{ $product->photo ? asset($product->photo) : 'https://via.placeholder.com/300' }}" class="card-img-top" alt="Imágen de producto" height="250" style="object-fit: cover"></a>
                            <div class="card-body">
                                <a href="{{ route('product.show', $product->id) }}"><h2 class="card-title">{{ $product->name }}</h2></a>
                                <!--p class="card-text m-0">Descripción: {{ $product->description }}</p-->
                                <h4 class="card-text m-0 pb-3">{{ $product->price }}€</h4>
                                <p class="card-text m-0 text-danger">Solo quedan {{ $product->stock }} en stock</p>
                                <!--p class="card-text m-0">Activo: {{ $product->active ? 'Sí' : 'No' }}</p-->
                                <a href="{{ route('provider.show', $product->provider_id) }}">{{ $product->providers->name }}</a>

                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-block btn-danger mt-3">Ver producto</a>


                                @if(Auth::check() && (auth()->user()->type_user === 3))
                                    <form method="POST" action="{{  route('product.destroy', $product->id) }}" class="mt-3">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-lg btn-primary">Editar producto</a>
                                        <button class="btn btn-lg btn-danger">Borrar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger w-100" role="alert">No hay ningún producto</div>
                @endforelse
            </div>
            {{ $productos->links() }}
        </div>
    </div>
@endsection
