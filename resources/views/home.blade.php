@extends('plantilla')
@section('titulo', 'Home')
@section('contenido')
    <div class="page-home">

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('/imgs/pages/portada1.jpg') }}" alt="First slide">
                    <div class="carousel-caption">
                        <h2>Nueva colección</h2>
                        <a href="{{ route('product.index') }}" class="btn btn-danger mt-3">Descubrir</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/imgs/pages/portada2.jpg') }}" alt="Second slide">
                    <div class="carousel-caption">
                        <h2>Nueva colección</h2>
                        <a href="{{ route('product.index') }}" class="btn btn-danger mt-3">Descubrir</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('/imgs/pages/portada3.jpg') }}" alt="Third slide">
                    <div class="carousel-caption">
                        <h2>Nueva colección</h2>
                        <a href="{{ route('product.index') }}" class="btn btn-danger mt-3">Descubrir</a>
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


        <script>
            $('.carousel').carousel({
                interval: 5000
            })
        </script>
       

        <div class="container my-5 py-5">
            <div class="row py-5 align-items-center">
                <div class="col-12 col-lg-6">
                    <h2 class="featurette-heading display-4">Sobre<span class="font-weight-bold"> nosotros</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                    <a href="{{ route('product.index') }}" class="btn btn-danger mt-3">Ver productos</a>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{ asset('/imgs/pages/about.jpg') }}" class="img-thumbnail" alt="Sobre nosotros">
            </div>
            </div>
        </div>

      

        <div class="jumbotron text-center">
            <div class="container">
                <h1 class="display-4">Lorem ipsum dolor!</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipiscing, elit purus mi imperdiet tempus faucibus, facilisi mauris gravida duis semper. Rutrum rhoncus ultricies sapien dis fames laoreet sem ligula aenean, vel malesuada cursus</p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary" href="{{ route('order.index') }}">Ver comandas</a>
                </p>
            </div>
        </div>

        <div class="container mb-5 py-5">
            <div class="row mt-5">
                <div class="col-12 col-sm-4">
                    <img src="{{ asset('/imgs/pages/about2.jpg') }}" class="img-thumbnail" alt="about-image">
                </div>
                <div class="col-12 col-sm-4">
                    <img src="{{ asset('/imgs/pages/about3.jpg') }}" class="img-thumbnail" alt="about-image">
                </div>
                <div class="col-12 col-sm-4">
                    <img src="{{ asset('/imgs/pages/about4.jpg') }}" class="img-thumbnail" alt="about-image">
                </div>
            </div>
        </div>

    </div>



@endsection
