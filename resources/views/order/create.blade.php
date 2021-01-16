@extends('plantilla')
@section('titulo', 'Listado de comandas')
@section('contenido')
    <div class="page-create-comanda">
        <div class="container my-5">
            <h1>Nueva comanda</h1>
            <br>

            <form action="{{ route('order.store') }}" method='POST'>
                @csrf
                <input id="user_id" name="user_id" type="hidden" value="{{ auth()->user()->id }}">
                <input id="user_type_id" name="user_type_id" type="hidden" value="{{ auth()->user()->type_user }}">
                <div class="form-group">
                    <label for="state">Estado de la comanda</label>
                    <select class="form-control" id="state" name="state">
                        <option value="En preparación" selected>En preparación</option>
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
                    <textarea name="address" id="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                    @if ($errors->has('address'))
                        <div class="text-danger">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Crear comanda</button>
            </form>
        </div>
    </div>
@endsection
