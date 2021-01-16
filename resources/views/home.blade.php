@extends('plantilla')
@section('titulo', 'Home')
@section('contenido')
    <div class="page-home">
        <div class="row portada-home"></div>

        <div class="container my-5">
            <div class="row py-5 align-items-center">
                <div class="col-12 col-lg-6">
                    <h1>Lorem Ipsum</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing, elit purus mi imperdiet tempus faucibus,
                        facilisi mauris gravida duis semper. Rutrum rhoncus ultricies sapien dis fames laoreet sem ligula
                        aenean, vel malesuada cursus ac magna leo ullamcorper fusce habitasse mus, dictum litora bibendum
                        lectus risus etiam nullam primis aliquam, convallis dignissim taciti faucibus conubia condimentum
                        blandit posuere. Fusce donec ultrices montes rhoncus orci viverra felis fringilla cum.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing, elit purus mi imperdiet tempus faucibus,
                        facilisi mauris gravida duis semper. Rutrum rhoncus ultricies sapien dis fames laoreet sem ligula
                        aenean, vel malesu
                    </p>
                    <a href="{{ route('home') }}" class="btn btn-success">Sobre nosotros</a>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="https://images.pexels.com/photos/1606573/pexels-photo-1606573.png?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-thumbnail" alt="Sobre nosotros">
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
                    <img src="https://images.pexels.com/photos/190482/pexels-photo-190482.jpeg?cs=srgb&dl=pexels-zukiman-mohamad-190482.jpg&fm=jpg" class="img-thumbnail" alt="about-image">
                </div>
                <div class="col-12 col-sm-4">
                    <img src="https://images.pexels.com/photos/5691342/pexels-photo-5691342.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-thumbnail" alt="about-image">
                </div>
                <div class="col-12 col-sm-4">
                    <img src="https://images.pexels.com/photos/5192027/pexels-photo-5192027.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-thumbnail" alt="about-image">
                </div>
            </div>
        </div>

    </div>

    <style>
        .page-home .portada-home
        {
            width: 100vw;
            height: 600px;
            background-image: url(https://images.pexels.com/photos/374894/pexels-photo-374894.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            overflow: hidden;
        }
    </style>



@endsection
