@extends('layouts.plantilla')
@section('contenido')

    <h1>Alta de un producto</h1>

    <div class="alert bg-light p-4 col-8 mx-auto shadow">
        <form class="row g-3" action="/producto/store" method="post">
        @csrf
            <div class="col-md-1">
                <label for="cod_producto">Código</label>
                <input type="number" name="cod_producto"
                       class="form-control" id="cod_producto" required>
            </div>
            <div class="col-md-2">
                <label for="cod_categoria">Categoría</label>
                <input type="text" name="cod_categoria"
                       class="form-control" id="cod_categoria" required>
            </div>
            <div class="col-md-5">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre"
                       class="form-control" id="nombre" required>
            </div>
            <div class="col-md-2">
                <label for="precio">Precio</label>
                <input type="text" name="precio"
                       class="form-control" id="precio" required>
            </div>
            <div class="col-md-2">
                <label for="stock">Stock</label>
                <input type="text" name="stock"
                       class="form-control" id="stock" required>
            </div>

            <div class="col-md-10">
                <button class="btn btn-dark my-3 px-4">Agregar producto</button>
                <a href="/productos" class="btn btn-outline-secondary">
                    Volver a panel de productos
                </a>
            </div>
        </form>
    </div>

@endsection