@extends('plantilla')
@section('titulo', 'Listado de comandas')
@section('contenido')
    <div class="container">
        <h1>Nueva comanda</h1>
        <form action="{{ route('order.store') }}" method='POST'>
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Estado de la comanda</label>
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
                <label for="synopsis">Dirección</label>
                <textarea name="address" id="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                @if ($errors->has('address'))
                    <div class="text-danger">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Crear comanda</button>
            </div>
        </form>
    </div>
@endsection
