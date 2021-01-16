@extends('plantilla')
@section('titulo', 'Listado de comandas')
@section('contenido')
    <div class="page-comanda">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Listado de comandas</h1>
            </div>
            <div class="row py-4">
                @if(Auth::check() && (auth()->user()->rol === 1 || auth()->user()->type_user === 1))
                    <a class="btn btn-success" href="{{ route('order.create') }}">+ Añadir comanda</a>
                @endif
            </div>

            <div class="row">
                @forelse($orders as $order)
                    <div class="col-4 mb-5">
                        <div class="card">
                            <!--img src="..." class="card-img-top" alt="..."-->
                            <div class="card-body">
                                <h5 class="card-title">ID {{ $order->id }}</h5>
                                <p class="card-text">Usuario: {{ $order->users->name }}</p>
                                <p class="card-text">Dirección: {{ $order->address }}.</p>
                                <a href="{{ route('order.show', $order->id) }}">Ver comanda</a>
                                <br><br>

                                @if(Auth::check() && (auth()->user()->rol === 1 || auth()->user()->type_user === 1))

                                    <form method="POST" action="{{  route('order.destroy', $order->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-lg btn-primary">Editar comanda</a>
                                        <button class="btn btn-lg btn-danger">Borrar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-danger w-100" role="alert">No hay ninguna comanda</div>
                @endforelse
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
