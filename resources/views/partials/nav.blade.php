<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">{{ Auth::check() ? Auth::user()->name : 'Menú' }}</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('order.index') }}">Comandas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('order.create') }}">Crear comanda</a>
            </li>
            <li class="nav-item">
                @if(!Auth::check())
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                @else
                    <a class="nav-link" href="{{ route('exit') }}">Logout</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
