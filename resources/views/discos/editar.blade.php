@extends('layouts.main-layout')
@section('content-area')
    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex justify-content-center card-header">
                        <h3 class="card-title">Agregar Disco a la Base de Datos</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card body p-4">
                        <form action="{{ route('discos.update', ['disco' => $disco]) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del disco: </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') ? : $disco->nombre }}" />
                            </div>
                            <div class="mb-3">
                                <label for="artista" class="form-label">Nombre del artista/grupo: </label>
                                <input type="text" class="form-control" id="artista" name="artista" value="{{ old('nombre') ? : $disco->artista }}" />
                            </div>
                            <div class="mb-3">
                                <label for="formato" class="form-label">Tipo de formato: </label>
                                <select class="form-select" id="formato" name="formato">
                                    <option {{ old('formato')=='CD' ? 'selected' : ($disco->formato == 'CD' ? 'selected' : '') }}>CD</option>
                                    <option {{ old('formato')=='Vinilo' ? 'selected' : ($disco->formato == 'Vinilo' ? 'selected' : '') }}>Vinilo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pais" class="form-label">Pais: </label>
                                <input type="text" class="form-control" id="pais" name="pais" value="{{ old('nombre') ? : $disco->pais }}" />
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha: </label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('nombre') ? : $disco->fecha }}" />
                            </div>
                            <div class="mb-3">
                                <label for="genero" class="form-label">Género: </label>
                                <input type="text" class="form-control" id="genero" name="genero" value="{{ old('nombre') ? : $disco->genero }}" />
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio: </label>
                                <input type="number" class="form-control" id="precio" name="precio" value="{{ old('nombre') ? : $disco->precio }}" />
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Seleccionar imagen: </label>
                                <input type="file" class="form-control" id="imagen" name="imagen" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <input type="submit" class="btn btn-warning" value="Guardar" id="agregar" name="agregar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
