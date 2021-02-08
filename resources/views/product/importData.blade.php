@extends('plantilla')
@section('titulo', 'Importar datos')
@section('contenido')
    <div class="page-create-product">
        <div class="container my-5">

            @if(isset($correctImport) && $correctImport = true)
                <div class="alert alert-success w-100" role="alert">Se han importado los datos correctamente</div>
            @endif

            <div class="row pt-5">
                <h1>Importar datos</h1>
            </div>

            <form action="{{ route('importData') }}" method="POST" class="w-100" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="input-group col-sm-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="importData" id="importData" required>
                            <label class="custom-file-label " for="customFile">Seleccione ficheros de datos</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Importar</button>
            </form>
        </div>
    </div>
@endsection
