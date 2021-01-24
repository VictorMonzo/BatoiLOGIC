@extends('plantilla')
@section('titulo', 'Editar producto')
@section('contenido')
    <div class="page-create-comanda">
        <div class="container my-5">

            <div class="row pt-5">
                <h1>Editar producto</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('product.update', $product[0]->id) }}" method='POST' class="w-100" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" required value="{{ $product[0]->name }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" class="form-control" min="0" required value="{{ $product[0]->price }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" id="stock" name="stock" class="form-control" min="1" step="0.01" required value="{{ $product[0]->stock }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required>{{ $product[0]->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="provider_id">Seleccione un proveedor</label>
                                <select class="form-control" id="provider_id" name="provider_id" required>
                                    <option value="{{ $product[0]->provider_id }}">{{ $product[0]->providers->name }} (Actual)</option>
                                    @forelse($providers as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                    @empty
                                        <option value="">No hay proveedores</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="file-input" name="photo" type="file" class="form-control" accept="image/gif,image/jpeg,image/jpg,image/png"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex">
                            <button type="submit" class="btn btn-primary">Actualizar producto</button>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="active" name="active" {{ $product[0]->active ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Activo</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
