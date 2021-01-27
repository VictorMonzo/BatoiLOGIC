@extends('plantilla')
@section('titulo', 'Ver comanda')
@section('contenido')

<div class="page-users">
    <div class="container my-5">
        <div class="row pt-5">
            <h1><i class="fas fa-boxes"></i> Pedido de <b> {{ $order[0]->users->name }} {{ $order[0]->users->surname }}</b></h1>
        </div>

        <div class="row py-4">
            <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
        </div>


        <div class="row py-4">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Estado: {{ $order[0]->states->name }}</h5>
                        <p class="card-text m-0">{{ $order[0]->users->email }}</p>
                        <p class="card-text m-0 mb-3">{{ $order[0]->address }}</p>
                        @if($order[0]->dealer_id)
                            <p>Repartidor: <a href="{{ route('user.show', $order[0]->dealer_id) }}">{{ $order[0]->dealers->name }}</a></p>
                        @endif

                        @if(Auth::check() && (auth()->user()->type_user === 3 || auth()->user()->type_user === 2))

                            <form method="POST" action="{{  route('order.destroy', $order[0]->id) }}">
                                @method('DELETE')
                                @csrf
                                @if($order[0]->state != 3 || auth()->user()->type_user === 3)
                                    <a href="{{ route('order.edit', $order[0]->id) }}" class="btn btn-lg btn-primary">Editar comanda</a>
                                @endif
                                <button class="btn btn-lg btn-danger">Borrar</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        @include('partials.order-line.show', ['orderLines' => $orderLines])
        {{ $orderLines->links() }}
    </div>
</div>

@endsection
