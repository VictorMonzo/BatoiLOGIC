@extends('plantilla')
@section('titulo', 'Crear producto')
@section('contenido')
    <div class="page-create-product">
        <div class="container my-5">
            <div class="row pt-5">
                <h1>Nuevo producto</h1>
            </div>

            <div class="row py-4">
                <a href="{{ url()->previous() }}" class="btn btn-lg btn-primary">Atrás</a>
            </div>

            <div class="row py-4">
                <form action="{{ route('product.store') }}" method='POST' class="w-100" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" class="form-control" min="1" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-6 col-md-2">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" id="stock" name="stock" class="form-control" min="0" required>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-9 col-md-7">
                            <div class="form-group">
                                <label for="categorie">Seleccione una categoría</label>
                                <select class="form-control" id="categorie_id" name="categorie_id" required>
                                    <option value="">Seleccione una categoría</option>
                                    @forelse($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @empty
                                        <option value="">No hay categorías</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-3 col-md-5">
                            <div class="form-group">
                                <label for="discount">Descuento</label>
                                <input type="number" id="discount" name="discount" class="form-control" min="0" step="0.01" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label for="address">Descripción</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="provider">Seleccione un proveedor</label>
                                <select class="form-control" id="provider_id" name="provider_id" required>
                                    <option value="">Seleccione un proveedor</option>
                                    @forelse($providers as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                    @empty
                                        <option value="">No hay proveedores</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <input id="file-input" name="photo" type="file" class="form-control" accept="image/gif,image/jpeg,image/jpg,image/png" required/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex">
                            <button type="submit" class="btn btn-primary">Crear producto</button>
                            <div class="form-check ml-3">
                                <input type="checkbox" class="form-check-input" id="active" name="active">
                                <label class="form-check-label" for="exampleCheck1">Activo</label>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
