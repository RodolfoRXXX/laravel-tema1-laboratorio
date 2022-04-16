@extends('layouts.plantilla')
@section('contenido')

    <h1>Panel de administración de Categorías</h1>

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
            <a href="/categoria/create" class="btn btn-outline-secondary">
                <i class="bi bi-plus-square"></i>
                Agregar categoría
            </a>
        </div>
    </div>


    <ul class="list-group">
        <li class="col-md-6 list-group-item list-group-item-action d-flex justify-content-between">
            <div class="col-4">
                Código
            </div>
            <div class="col-4">
                Descripción
            </div>
            <div class="col-2 text-center">
                Edición
            </div>
            <div class="col-2 text-center">
                Suprimir
            </div>
        </li>
    @foreach( $categorias as $categoria )
        <li class="col-md-6 list-group-item list-group-item-action d-flex justify-content-between">
            <div class="col">
                <span class="fs-4">{{ $categoria->cod_categoria }}</span>
            </div>
            <div class="col">
                <span class="fs-4">{{ $categoria->descripcion }}</span>
            </div>
            <div class="col text-end btn-group">
                <a href="/categoria/edit/{{ $categoria->cod_categoria }}" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-pencil-square"></i>
                    Modificar
                </a>
                <a href="/categoria/delete/id" class="btn btn-outline-secondary me-1">
                    <i class="bi bi-trash"></i>
                    &nbsp;Eliminar&nbsp;
                </a>
            </div>
        </li>
    @endforeach
    </ul>

@endsection