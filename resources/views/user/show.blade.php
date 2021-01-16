@extends('plantilla')
@section('titulo', 'Ver usuario')
@section('contenido')

    <h1>Ver usuario</h1>

    <div class="row py-4">
        <a href="{{ route('user.index') }}" class="btn btn-lg btn-primary">Atrás</a>
    </div>

    <p>Nombre: {{ $user[0]->name.' '.$user[0]->surname }}</p>
    <p>Email: {{ $user[0]->email }}</p>
    <p>Dirección: {{ $user[0]->address }}</p>
    <p>Tipo usuario: {{ $user[0]->type_user ? 'Dealer' : 'Customer' }}</p>
    <p>Rol:{{ $user[0]->rol ? 'Administrador' : 'Común' }}</p>

    @if(Auth::check() && (auth()->user()->rol === 1))
        <form method="POST" action="{{  route('user.destroy', $user[0]->id) }}" class="pt-4">
            @method('DELETE')
            @csrf
            <a href="{{ route('user.edit', $user[0]->id) }}" class="btn btn-lg btn-primary">Editar usuario</a>
            <button class="btn btn-lg btn-danger">Eliminar usuario</button>
        </form>
    @endif

    <h2>Lista de comandas</h2>

    @forelse($orders as $order)
        <p>--------------------------------------</p>
        <p>Estado: {{ $order->state }}</p>
        <p>Dirección: {{ $order->address }}</p>
        <a href="{{ route('order.show', $order->id) }}">Ver comanda</a>
    @empty
        <div class="alert alert-danger" role="alert">
            No hay comandas
        </div>
    @endforelse

@endsection
