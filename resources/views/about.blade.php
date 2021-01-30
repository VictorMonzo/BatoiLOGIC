@extends('plantilla')
@section('titulo', 'Home')
@section('contenido')



    <div class="portada-about">
        <video autoplay loop id="video-background" muted plays-inline>
            <source src="{{ asset('/imgs/pages/video-about.mp4') }}" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="h-100 align-items-center justify-content-center text-center d-flex flex-column">
                <h1 class="text-uppercase text-white font-weight-bold mb-4 pb-4">Be the exception</h1>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about1" target="_top">Descubrir</a>
            </div>
        </div>
    </div>



    <div class="container py-5" id="about1">
        <div class="row py-5 align-items-center">
            <div class="col-12 col-lg-6 mb-5">
                <h2 class="featurette-heading  mb-3">Sobre<span class="font-weight-bold"> nosotros</span></h2>
                <p>Somos distribuidores oficiales de grandes marcas como Nike, Adidas, Puma, Converse, Champion, entre muchas otras.</p>
                <p>Nuestros productos están pensados para gente con estilo, que le gusta la moda urbana o la deportiva y que quiere sentirse cómodo y cool. No nos limitamos a ningún género ni rango de edades, ya que las zapatillas, ropa y complementos, son productos que todo el mundo gasta y necesita.</p>
                <a href="{{ route('product.index') }}" class="btn btn-danger mt-3">Ver productos</a>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{ asset('/imgs/pages/about.jpg') }}" class="img-thumbnail" alt="Sobre nosotros">
            </div>
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


    <div class="container py-5 about3">
        <div class="row py-5 align-items-center">
            <div class="col-12 col-lg-6 mb-5">
                <img src="{{ asset('/imgs/pages/about1.jpg') }}" class="img-thumbnail" alt="Sobre nosotros">
            </div>
            <div class="col-12 col-lg-6">
                <h2 class="featurette-heading ">#<span class="font-weight-bold text-danger">SneakShoes</span></h2>
                <div class="row">
                    <div class="col-md-6 text-left">
                        <div class="mt-5">
                            <i class="fas fa-box mb-3"></i>
                            <h4 class="my-2 font-weight-bold">Envío gratis</h4>
                            <p class="text-muted mb-0 ">Gastos de envío gratuitos para pedidos que superen los 40€.​</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-left">
                        <div class="mt-5">
                            <i class="fas fa-star mb-3"></i>
                            <h4 class="my-2 font-weight-bold">Calidad</h4>
                            <p class="text-muted mb-0 ">Sneak ofrece artículos de alta calidad con diseños increíbles.​</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-left">
                        <div class="mt-5">
                            <i class="fas fa-rocket mb-3"></i>
                            <h4 class="my-2 font-weight-bold">Nuevas marcas</h4>
                            <p class="text-muted mb-0 ">Impulsamos nuevas marcas del sector a darse a conocer e impulsar sus ventas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.instagram')      
       

@endsection
