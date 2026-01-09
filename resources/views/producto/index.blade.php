@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Productos
    </h2>
    <a href="{{route('producto.create')}}" class="btn btn-primary">Crear producto</a>
@endsection

@section('page content')
    <table id="tablaFiltrable" class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Color</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tamaño</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->color }}</td>
                <td>{{ $producto->categoria->tipo}}</td>
                <td>{{ $producto->tamaño->tipo}}</td>
                <td>{{ $producto->descripción }}</td>
                <td>
                    <form action="{{route('producto.destroy',$producto->id)}}" method="POST">
                        <a href="productos/{{$producto->id}}/edit" class="btn btn-info">Editar</a>
                        <a href="productos/{{$producto->id}}/show" class="btn btn-info">Ver más</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
