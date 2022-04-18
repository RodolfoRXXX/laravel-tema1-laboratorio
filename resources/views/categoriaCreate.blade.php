@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de una categoría</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form class="row g-3" action="/categoria/store" method="post">
        @csrf
            <div class="col-md-4">
                <label for="codCategoria">Código de la categoría</label>
                <input type="number" name="codCategoria"
                       class="form-control" id="codCategoria" required>
            </div>
            <div class="col-md-8">
                <label for="desCategoria">Nombre de la categoría</label>
                <input type="text" name="desCategoria"
                       class="form-control" id="desCategoria" required>
            </div>

            <div class="col-md-10">
                <button class="btn btn-dark my-3 px-4">Agregar categoría</button>
                <a href="/categorias" class="btn btn-outline-secondary">
                    Volver a panel de categorías
                </a>
            </div>
        </form>
    </div>

@endsection