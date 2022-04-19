@extends('layouts.plantilla')
@section('contenido')

    <h1>Panel de administración de productos</h1>

    @if( session('mensaje') )
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="row my-3 d-flex justify-content-between">
        <div class="col">
            <a href="/admin" class="btn btn-outline-secondary">
                Dashboard
            </a>
        </div>
        <div class="col text-end">
            <a href="/producto/create" class="btn btn-outline-secondary">
                <i class="bi bi-plus-square"></i>
                Agregar producto
            </a>
        </div>
    </div>

    <ul class="list-group">
        <li class="col-md-6 list-group-item list-group-item-action d-flex justify-content-between">
            <div class="col-1">
                Código
            </div>
            <div class="col-2">
                Categoría
            </div>
            <div class="col-2">
                Nombre
            </div>
            <div class="col-2 text-center">
                Precio
            </div>
            <div class="col-2 text-center">
                Stock
            </div>
            <div class="col-2">
                Edición
            </div>
            <div class="col-2">
                Suprimir
            </div>
        </li>
    @foreach( $productos as $producto )
        <li class="col-md-6 list-group-item list-group-item-action d-flex justify-content-between">
            <div class="col-1">
                <span class="fs-5">{{ $producto->cod_producto }}</span>
            </div>
            <div class="col-2">
                {{ $producto->cod_categoria }}
            </div>
            <div class="col-2">
                {{ $producto->nombre }}
            </div>
            <div class="col-2 text-center">
                <span class="precio3">${{ $producto->precio }}</span>
            </div>
            <div class="col-2 text-center">
                {{ $producto->stock }}
            </div>
            <div class="col text-end btn-group">
                <a href="/producto/edit/{{ $producto->cod_producto }}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-pencil-square"></i>
                    Modificar
                </a>
                <a href="/producto/delete/{{ $producto->cod_producto }}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-trash"></i>
                    &nbsp;Eliminar&nbsp;
                </a>
            </div>
        </li>
    @endforeach
    </ul>
@endsection