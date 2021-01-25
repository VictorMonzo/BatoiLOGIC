@extends('plantilla')
@section('titulo', 'Crear comanda')
@section('contenido')
    <div class="page-create-comanda">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Nueva comanda</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('order.store') }}" method='POST' class="w-100">
                    @csrf
                    <input id="user_id" name="user_id" type="hidden" value="{{ auth()->user()->id }}">

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea name="address" id="address" class="form-control" rows="3" required>{{ auth()->user()->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="address">Seleccione un producto</label>
                        <select class="form-control" id="product_id" name="product_id" required>
                            @if(isset($idProduct))
                                <option value="{{ $idProduct }}">{{ $productSelectedName->name }}</option>
                            @else
                                <option value="">Seleccione un producto</option>
                            @endif

                            @forelse($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @empty
                                <option value="">No hay productos</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Cantidad</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Crear comanda</button>
                </form>
            </div>
        </div>
    </div>
@endsection
