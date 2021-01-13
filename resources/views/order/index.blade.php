@extends('plantilla')
@section('titulo', 'Listado de comandas')
@section('contenido')
    <h1>Listado de comandas</h1>

    @forelse($orders as $order)
        <h1>ID: {{ $order->id }}</h1>
        <h3>Estado: {{ $order->state }}</h3>
        <h3>Address: {{ $order->address }}</h3>

        @if(Auth::check() && (auth()->user()->rol === 1 || auth()->user()->type_user === 1))
            <a href="{{ route('order.edit', $order->id) }}" class="btn btn-secondary">Editar comanda</a>
            <form method="POST" action="{{  route('order.destroy', $order->id) }}">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Borrar</button>
            </form>
        @endif

    @empty
        <div class="alert alert-danger" role="alert">
            No hay ninguna comanda
        </div>
    @endforelse

    {{ $orders->links() }}
@endsection
