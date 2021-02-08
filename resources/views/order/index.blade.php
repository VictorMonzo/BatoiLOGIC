@extends('plantilla')
@section('titulo', 'Listado de comandas')
@section('contenido')
    <div class="page-comanda">
        <div class="container my-5">
            <div class="row pt-5">
                <h1> {{ Auth::check() && auth()->user()->type_user === 2 ? 'Comandas a repartir' : 'Listado de comandas' }}</h1>
            </div>
            <div class="row py-4">
                @if(Auth::check() && (auth()->user()->type_user === 3 || auth()->user()->type_user === 1))
                    <a class="btn btn-success" href="{{ route('order.create') }}">+ Añadir comanda</a>
                @endif

                @if($noDealer)
                    @if(Auth::check() && auth()->user()->type_user === 3)
                        <a class="btn btn-secondary ml-auto" href="{{ route('order.index') }}">Ver comandas con repartidor</a>
                    @endif
                @else
                    @if(Auth::check() && auth()->user()->type_user === 3)
                        <a class="btn btn-secondary ml-auto" href="{{ route('noDealer') }}">Ver comandas sin repartidor</a>
                    @endif
                @endif

                @if(auth()->user()->type_user === 2)
                    <a class="btn btn-secondary ml-auto" href="{{ route('pdf-generate', auth()->user()->id) }}">Generar albarán (PDF)</a>
                @endif
            </div>

            <div class="row">
                @forelse($orders as $order)
                    <div class="col-12 col-md-6 col-lg-4 mb-5">
                        <div class="card">
                            <!--img src="..." class="card-img-top" alt="..."-->
                            <div class="card-body">
                                <h5 class="card-title text-success"><a href="{{ route('order.show', $order->id) }}" class="text-success"><i class="fas fa-boxes"></i> #{{ $order->id }}</a></h5>
                                <p class="card-text m-0 py-3"><b>{{ $order->users->name }} {{ $order->users->surname }}</b></p>
                                <p class="card-text m-0"><i class="fas fa-envelope"></i> {{ $order->users->email }}</p>
                                <p class="card-text m-0 pb-3"><i class="fas fa-map-marker-alt"></i> {{ $order->address }}.</p>
                                <a href="{{ route('order.show', $order->id) }}">Ver pedido</a>

                                @if(Auth::check() && (auth()->user()->type_user === 3 || auth()->user()->type_user === 2))
                                    <form method="POST" action="{{  route('order.destroy', $order->id) }}" class="mt-3">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary">Editar comanda</a>
                                        <button class="btn btn-danger">Borrar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-danger w-100" role="alert">No hay ninguna comanda</div>
                @endforelse
            </div>
            {{ $orders->links() }}
        </div>
    </div>
@endsection
