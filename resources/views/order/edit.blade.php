@extends('plantilla')
@section('titulo', 'Editar comanda')
@section('contenido')

    <div class="page-create-comanda">
        <div class="container my-5">
            <h1>Editar comanda</h1>
            <br>

            <form action="{{ route('order.update', $order[0]->id) }}" method='POST'>
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="state">Estado de la comanda</label>
                    <select class="form-control" id="state" name="state">
                        <option value="{{ $order[0]->state }}">{{ $order[0]->state }} (Actual)</option>
                        <option value="En preparación">En preparación</option>
                        <option value="En camino">En camino</option>
                        <option value="Entregado">Entregado</option>
                        <option value="Llegada con retraso">Llegada con retraso</option>
                        <option value="Esperando más stock">Esperando más stock</option>
                    </select>
                    @if ($errors->has('state'))
                        <div class="text-danger">
                            {{ $errors->first('state') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <textarea name="address" id="address" class="form-control" rows="3">{{ $order[0]->address }}</textarea>
                    @if ($errors->has('address'))
                        <div class="text-danger">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Actualizar comanda</button>
            </form>

            <a href="{{ route('order.index') }}" class="btn btn-lg btn-primary">Atrás</a>
        </div>
    </div>

@endsection
