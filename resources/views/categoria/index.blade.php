@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Categorias
    </h2>
    <a href="{{route('categoria.create')}}" class="btn btn-primary">Crear categoria</a>
@endsection

@section('page content')
    <table  class="table table-striped mt-4" >
        <thead>
            <tr>
                <th scope="col">Nombre </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->tipo }}</td>
                <td>
                    <form action="{{route('categoria.destroy',$categoria->id)}}" method="POST">
                        <a href="categorias/{{$categoria->id}}/edit" class="btn btn-info">Editar</a>
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
