<header class="shadow p-0">
    <nav class="container navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand d-none d-lg-block" href="{{ route('home') }}">
                <img src="{{ asset('/imgs/logo-sneak.png') }}" alt="SNEAK" height="50px">
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.index') }}">Comandas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('provider.index') }}">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index') }}">Productos</a>
                </li>
            </ul>

            @if(Auth::check())
                <a href="{{ route('user.show', Auth::user()->id) }}">{{ Auth::user()->name}}</a>
                <a href="{{ route('user.show', Auth::user()->id) }}"><img src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : 'https://via.placeholder.com/300' }}" class="rounded-circle mx-4" height="30" width="30" style="object-fit: cover"></a>
            @endif

            @if(!Auth::check())
                <a class="btn btn-success mr-3" href="{{ route('login') }}">Login</a>
                <a class="btn btn-primary" href="{{ route('user.create') }}">{{ __('Register') }}</a>
            @else
                <a class="btn btn-danger" href="{{ route('exit') }}">Logout</a>
            @endif
            <!--form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form-->
        </div>
        <a class="navbar-brand d-lg-none d-block logo-ph" href="{{ route('home') }}">
            <img src="{{ asset('/imgs/logo-sneak.png') }}" alt="BatoiLogic logo" height="50px">
        </a>
    </nav>
</header>
