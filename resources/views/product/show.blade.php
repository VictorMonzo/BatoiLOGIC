@extends('plantilla')
@section('titulo', 'Ver producto')
@section('contenido')

    <div class="page-single-product">
        <div class="container my-5">
            <div class="row py-4">
                <div class="col-12 col-lg-7 pr-5">
                    <img src="{{ $product[0]->photo ? asset($product[0]->photo) : 'https://via.placeholder.com/300' }}" width="100%">
                </div>
                <div class="col-12 col-lg-5">
                    <a href="{{ url()->previous() }}" class="btn btn-danger d-none d-lg-block">
                        <i class="fas fa-chevron-left"></i> Atrás
                    </a>
                    <h1 class="display-4 font-weight-bold mt-4">{{ $product[0]->name }}</h1>
                    <p class="mb-2 text-muted text-uppercase small">
                        <a href="{{ route('provider.show', $product[0]->provider_id) }}">{{ $product[0]->providers->name }}</a>
                    </p>
                    <div class="rating pb-3">
                        <i class="fas fa-star fa-sm text-primary"></i>
                        <i class="fas fa-star fa-sm text-primary"></i>
                        <i class="fas fa-star fa-sm text-primary"></i>
                        <i class="fas fa-star fa-sm text-primary"></i>
                        <i class="far fa-star fa-sm text-primary"></i>
                    </div>
                    <h3 class="font-weight-bold">{{ $product[0]->price }} €</h3>
                    @if(Auth::check() && (auth()->user()->type_user === 3 || (auth()->user()->type_user === 1)))
                        <a href="{{ route('createIdProduct', $product[0]->id) }}" class="btn btn-primary mt-4"><i class="fas fa-shopping-cart pr-2"></i>Comprar</a>
                    @endif
                    <p class="my-2 text-uppercase small text-danger">Solo quedan: {{ $product[0]->stock }} unds.</p>
                    <p class="my-2 text-uppercase small text-danger">Activo: {{ $product[0]->active ? 'Sí' : 'No' }}</p>

                    <hr>

                    <h3>Descripción</h3>
                    <p class="pt-1">{{ $product[0]->description }}</p>
                    @if(Auth::check() && (auth()->user()->type_user === 3))

                        <form method="POST" action="{{  route('product.destroy', $product[0]->id) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('product.edit', $product[0]->id) }}" class="btn btn-lg btn-primary">Editar producto</a>
                            <button class="btn btn-lg btn-danger">Borrar</button>
                        </form>
                    @endif
                </div>
            </div>

            @include('partials.order-line.show', ['orderLines' => $orderLines])
            {{ $orderLines->links() }}
        </div>
    </div>
@endsection
