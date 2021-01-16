<header class="shadow p-0 bg-white">
    <nav class="container navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('/imgs/logo-batoilogic.svg') }}" alt="BatoiLogic logo" height="50px">
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
            </ul>
            <a class="navbar-brand" href="#">{{ Auth::check() ? Auth::user()->name : 'Menú' }}</a>

            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#000" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </span>

            @if(!Auth::check())
                <a class="btn btn-success" href="{{ route('login') }}">Login</a>
            @else
                <a class="btn btn-danger" href="{{ route('exit') }}">Logout</a>
            @endif
            <!--form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form-->
        </div>
    </nav>
</header>
