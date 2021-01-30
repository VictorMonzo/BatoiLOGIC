<header class="shadow p-0">
    <nav class="container navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand d-none d-lg-block py-3" href="{{ route('home') }}">
                <img src="{{ asset('/imgs/logo.svg') }}" alt="SNEAK" height="35px">
            </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        @forelse($categories as $categorie)
                            <a class="dropdown-item text-light" href="{{ route('indexByCategorie', $categorie->id) }}">{{ $categorie->name }}</a>
                        @empty
                            <a class="dropdown-item text-light" href="#">No hay categorías</a>
                        @endforelse
                        <a class="dropdown-item text-light" href="{{ route('product.index') }}">Ver todos <span class="menu-badge badge-bounce">NEW</span></a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('provider.index') }}">Proveedores</a>
                </li>                

                @if(Auth::check())
                    <li class="custom-divider" style="height: auto; background: #3a3a3a; width: 1px; margin: 0 1rem"></li>
                    <li class="divider"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.index') }}">Comandas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
                    </li>
                @endif
            </ul>

            @if(Auth::check())
                <a href="{{ route('user.show', Auth::user()->id) }}" class="text-light">{{ Auth::user()->name}}</a>
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
            <img src="{{ asset('/imgs/logo.svg') }}" alt="BatoiLogic logo" height="30px">
        </a>
    </nav>
</header>



<style>
    
</style>