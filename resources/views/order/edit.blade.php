@extends('plantilla')
@section('titulo', 'Editar comanda')
@section('contenido')

    <div class="page-create-comanda">
        <div class="container my-5">

            <div class="row pt-5">
                <h1>Editar comanda</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('order.update', $order[0]->id) }}" method='POST' class="w-100">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="state">Estado de la comanda</label>
                        <select class="form-control" id="state" name="state" required>
                            <option value="{{ $order[0]->state }}">{{ $order[0]->states->name }} (Actual)</option>
                            @forelse($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @empty
                                <option value="">No hay estados</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dealer">Seleccionar repartidor</label>
                        <select class="form-control" id="dealer_id" name="dealer_id" required>
                            @if($order[0]->dealer_id)
                                <option value="{{ $order[0]->dealer_id }}">{{ $order[0]->dealers->name }} (Actual)</option>
                            @else
                                <option value="">Seleccione un repartidor</option>
                            @endif

                            @forelse($dealers as $dealer)
                                <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
                            @empty
                                <option value="">No hay repartidores</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea disabled name="address" id="address" class="form-control" rows="3" required>{{ $order[0]->address }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar comanda</button>
                </form>
            </div>
        </div>
    </div>

@endsection
