@extends('layouts.plantilla')
@section('contenido')

    <h1>Eliminación de una categoría</h1>
    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form class="row g-3" action="/categoria/delete" method="post">
        @csrf
            <div class="col-md-4">
                <label for="cod_categoria">Código de la categoría</label>
                <input type="number" name="cod_categoria"
                       value="{{ $categoria->cod_categoria }}"
                       class="form-control" id="cod_categoria">
            </div>
            <div class="col-md-8">
                <label for="descripcion">Nombre de la categoría</label>
                <input type="text" name="descripcion"
                       value="{{ $categoria->descripcion }}"
                       class="form-control" id="descripcion" required>
            </div>

            <div class="col-md-10">
                <button class="btn btn-dark my-3 px-4">Eliminar categoría</button>
                <a href="/categorias" class="btn btn-outline-secondary">
                    Volver a panel de categorías
                </a>
            </div>
        </form>
    </div>

@endsection