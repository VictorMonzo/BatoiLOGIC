@extends('plantilla')
@section('titulo', 'Ver producto')
@section('contenido')

    <div class="page-single-product">
        <div class="container my-5">
            <div class="row py-4">
                <div class="col-12 col-lg-7 pr-5">
                    <img src="{{ $product[0]->photo ? asset($product[0]->photo) : 'https://via.placeholder.com/300' }}" width="100%">
                    @if(Auth::check() && (auth()->user()->type_user === 3))

                        <form method="POST" action="{{  route('product.destroy', $product[0]->id) }}" class="mt-5">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('product.edit', $product[0]->id) }}" class="btn btn-lg btn-primary">Editar producto</a>
                            <button class="btn btn-lg btn-danger">Borrar</button>
                        </form>
                    @endif
                </div>
                <div class="col-12 col-lg-5">
                    <a href="{{ url()->previous() }}" class="btn btn-danger d-none d-lg-block">
                        <i class="fas fa-chevron-left"></i> Atrás
                    </a>
                    <h2 class="mt-4">{{ $product[0]->name }}</h2>

                    <div class="rating pb-3 text-uppercase">
                        <i class="fas fa-star fa-sm text-success"></i>
                        <i class="fas fa-star fa-sm text-success"></i>
                        <i class="fas fa-star fa-sm text-success"></i>
                        <i class="fas fa-star fa-sm text-success"></i>
                        <i class="far fa-star fa-sm text-success"></i>
                        <a href="{{ route('indexByCategorie', $product[0]->categories->id) }}" class="text-primary">{{ $product[0]->categories->name }}</a>
                    </div>
                    <h3>{{ $product[0]->price }} €</h3>


                    @if(Auth::check() && (auth()->user()->type_user === 3 || (auth()->user()->type_user === 1)))
                        <a href="{{ route('createIdProduct', $product[0]->id) }}" class="btn btn-primary mt-5 mb-3"><i class="fas fa-shopping-cart pr-2"></i>Comprar</a>
                    @endif
                    <p class="my-2 text-danger"><b>Solo quedan</b> {{ $product[0]->stock }} en stock</p>
                    <p class="my-2 text-danger"><b>Activo:</b> {{ $product[0]->active ? 'Sí' : 'No' }}</p>
                    <a href="{{ route('provider.show', $product[0]->provider_id) }}" class="text-primary text-uppercase font-weight-bold">{{ $product[0]->providers->name }}</a>

                    <hr>


                    <div id="accordion">
                        <div>
                            <div id="headingOne">
                                <h3 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Descripción
                                </h3>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">{{ $product[0]->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::check() && auth()->user()->type_user === 3)
                @include('partials.order-line.show', ['orderLines' => $orderLines])
                {{ $orderLines->links() }}
            @endif

            <div class="row pt-5 mb-3">
                <h3>Productos relacionados</h3>
            </div>
            <div class="container my-5">
                <div class="row">
                    @forelse($productsRela as $product)
                        <div class="col-12 col-md-6 col-lg-4 mb-5">
                            <div class="card product">
                                <a href="{{ route('product.show', $product->id) }}"><img src="{{ $product->photo ? asset($product->photo) : 'https://via.placeholder.com/300' }}" class="card-img-top" alt="Imágen de producto" height="250" style="object-fit: cover"></a>
                                <div class="card-body">
                                    <a href="{{ route('product.show', $product->id) }}"><h4 class="text-dark">{{ $product->name }}</h4></a>
                                    <p class="text-primary m-0 pb-3">{{ $product->price }}€</p>
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('provider.show', $product->provider_id) }}" class="text-primary">{{ $product->providers->name }}</a>
                                        </div>
                                        <div class="col text-right">
                                            <span class="card-text m-0 text-danger">{{ $product->stock }} en stock</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-block btn-danger mt-3">Ver producto</a>


                                    @if(Auth::check() && (auth()->user()->type_user === 3))
                                        <form method="POST" action="{{  route('product.destroy', $product->id) }}" class="mt-3">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Editar producto</a>
                                            <button class="btn btn-danger">Borrar</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger w-100" role="alert">No hay ningún producto</div>
                    @endforelse
                </div>
            </div>
            {{ $productsRela->links() }}

        </div>
    </div>
@endsection
