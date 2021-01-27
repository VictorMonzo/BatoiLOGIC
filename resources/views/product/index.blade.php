@extends('plantilla')
@section('titulo', 'Listado de productos')
@section('contenido')
    <div class="page-products">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Listado de productos</h1>
            </div>
            <div class="row py-4">
                @if(Auth::check() && (auth()->user()->type_user === 3))
                    <a class="btn btn-success" href="{{ route('product.create') }}">+ Añadir producto</a>
                @endif
            </div>

            <div class="row">
                @forelse($products as $product)

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
            {{ $products->links() }}
        </div>
    </div>
@endsection
