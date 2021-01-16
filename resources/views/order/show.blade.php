@extends('plantilla')
@section('titulo', 'Ver comanda')
@section('contenido')

<div class="page-users">
    <div class="container my-5">
        <div class="row pt-5">
            <h1>Comanda de {{ $order[0]->users->name }}</h1>
        </div>

        <div class="row py-4">
            <a href="{{ route('order.index') }}" class="btn btn-lg btn-primary">Atrás</a>
        </div>


        <div class="row py-4">
            <div class="col-4 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Estado: {{ $order[0]->state }}</h5>
                        <p class="card-text">Dirección: {{ $order[0]->address }}</p>

                        @if(Auth::check() && (auth()->user()->rol === 1 || auth()->user()->type_user === 1))

                            <form method="POST" action="{{  route('order.destroy', $order[0]->id) }}">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('order.edit', $order[0]->id) }}" class="btn btn-lg btn-primary">Editar comanda</a>
                                <button class="btn btn-lg btn-danger">Borrar</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <h2>Líneas de comanda</h2>
        </div>
        <div class="row">
            @forelse($orderLines as $orderLine)
                <div class="p-3 mb-5 bg-white rounded box-shadow w-100">
                    <div class="media text-muted">
                        <div class="media-body mb-0">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <a href="#"><strong class="text-gray-dark">Producto: ____</strong></a>
                                <a href="#">Ver linea de comanda</a>
                            </div>
                            <span class="d-block">Cantidad: {{ $orderLine->quantity }}</span>
                            <span class="d-block">Precio: {{ $orderLine->price }}</span>
                            <span class="d-block">Descuento: {{ $orderLine->discount }}%</span>
                            <span class="d-block">Precio total: ____</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-danger" role="alert">
                    No hay lineas de comanda
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection


