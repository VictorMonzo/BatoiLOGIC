@extends('plantilla')
@section('titulo', 'Home')
@section('contenido')
    <div class="page-home p-0">

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('/imgs/pages/portada1.jpg') }}" alt="First slide">
                    <div class="carousel-caption">
                        <h2 class="featurette-heading">-20% en todo</h2>
                        <a href="{{ route('product.index') }}/categorie/1" class="btn btn-danger mt-3">Ver ofertas</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/imgs/pages/portada2.jpg') }}" alt="Second slide">
                    <div class="carousel-caption">
                        <h2 class="featurette-heading">Nueva colección</h2>
                        <a href="{{ route('product.index') }}/categorie/2" class="btn btn-danger mt-3">Descubrir</a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <script> $('.carousel').carousel({interval: 5000})</script>

        <h2 class="text-center my-5 pt-5">Novedades</h2>
        <div class="container my-5 pb-5">
            <div class="row">
                @forelse($products as $product)
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
            <div class="row justify-content-center">
                <a href="{{ route('product.index') }}" class="btn btn-success text-center">Ver todo</a>
            </div>
        </div>

        <div class="page-section bg-danger text-white about2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="font-wheight-bold h1">¡Tenemos lo que necesitas!</h2>
                        <p class="my-4">
                            Nos centramos principalmente en la venta de todo tipo de zapatillas: running,
                            casual, minimalistas… de muchas marcas reconocidas.
                            También ofrecemos una amplia colección de ropa urbana/deportiva y todo tipo
                            de accesorios y complementos.    
                        </p>
                        <a class="btn btn-light" href="{{ route('product.index') }}">Ver productos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-3 py-5" id="about1">
            <div class="row py-5 align-items-center">
                <div class="col-12 col-lg-6 mb-5">
                    <img src="{{ asset('/imgs/pages/about.jpg') }}" class="img-thumbnail" alt="Sobre nosotros">
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="featurette-heading  mb-3">Sobre<span class="font-weight-bold"> nosotros</span></h2>
                    <p>Somos distribuidores oficiales de grandes marcas como Nike, Adidas, Puma, Converse, Champion, entre muchas otras.</p>
                    <p>Nuestros productos están pensados para gente con estilo, que le gusta la moda urbana o la deportiva y que quiere sentirse cómodo y cool. No nos limitamos a ningún género ni rango de edades, ya que las zapatillas, ropa y complementos, son productos que todo el mundo gasta y necesita.</p>
                    <a href="{{ route('about') }}" class="btn btn-danger mt-3">Saber más</a>
                </div>
            </div>
        </div>

        @include('partials.instagram')

    </div>

@endsection
