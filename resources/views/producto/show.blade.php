@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Producto {{$producto->id}}
    </h2>
@endsection
@section('page content')
    <div class="container">
        <div class="card mb-3" style="max-width: 840px;">
            <div class="row g-0">

            <div class="col-md-4">
                    @if ($producto->imagen)
                        <img src="{{ $producto->imagen }}" class="img-fluid" alt="Imagen del producto">
                    @else
                        <p>Sin imagen</p>
                    @endif
                </div>
                
                <div class="col-md-8">
                    <div class="card-body">
                            <h5 class="card-title">Nombre: {{$producto->nombre}}</h5>
                            <p class="card-text">Categoria: {{ $producto->categoria->tipo }} </p>
                            <p class="card-text">Precio: {{ $producto->precio }} </p>
                            <p class="card-text">Tamaño: {{ $producto->tamaño->tipo }} </p>
                            <p class="card-text">Color: {{ $producto->color}} </p>
                            <p class="card-text">Descripción: {{ $producto->descripción }} </p>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
