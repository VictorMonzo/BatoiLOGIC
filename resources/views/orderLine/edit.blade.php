@extends('plantilla')
@section('titulo', 'Editar linea de comanda')
@section('contenido')

    <div class="page-create-comanda">
        <div class="container my-5">

            <div class="row pt-5">
                <h1>Editar linea de comanda</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('orderLine.update', $orderLine[0]->id) }}" method='POST' class="w-100">
                    @method('PUT')
                    @csrf
                    <input id="order_id" name="order_id" type="hidden" value="{{ $orderLine[0]->order_id }}">

                    <div class="form-group">
                        <label for="state">Cantidad</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $orderLine[0]->quantity }}" min="1" required>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar linea de comanda</button>
                </form>
            </div>
        </div>
    </div>

@endsection
