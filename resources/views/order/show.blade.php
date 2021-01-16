@extends('plantilla')
@section('titulo', 'Ver comanda')
@section('contenido')

<h1>Ver comanda del usuario {{ $order[0]->users->name }}</h1>

<p>Estado: {{ $order[0]->state }}</p>
<p>Dirección: {{ $order[0]->address }}</p>

<h2>Lineas de comanda</h2>
@forelse($orderLines as $orderLine)
    <!-- Esto muestra varias lineas de comandas para que lo tengas en cuenta -->
    <p>-------------------------------------</p>
    <p>Cantidad: {{ $orderLine->quantity }}</p>
    <p>Precio: {{ $orderLine->price }}</p>
    <p>Descuento: {{ $orderLine->discount }}%</p>
    <p>Precio total: <!-- Ya lo haré, tu pon un sitio donde ponerlo --></p>
    <a href="" class="btn btn-lg btn-primary">Ver linea de comanda</a>
    <p>-------------------------------------</p>
@empty
    <div class="alert alert-danger" role="alert">
        No hay lineas de comanda
    </div>
@endforelse



@if(Auth::check() && (auth()->user()->rol === 1 || auth()->user()->type_user === 1))

    <form method="POST" action="{{  route('order.destroy', $order[0]->id) }}">
        @method('DELETE')
        @csrf
        <a href="{{ route('order.edit', $order[0]->id) }}" class="btn btn-lg btn-primary">Editar comanda</a>
        <button class="btn btn-lg btn-danger">Borrar</button>
    </form>
@endif

<a href="{{ route('order.index') }}" class="btn btn-lg btn-primary">Atrás</a>

@endsection


