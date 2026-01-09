@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Tamaños
    </h2>
    <a href="{{route('tamaño.create')}}" class="btn btn-primary">Crear tamaño</a>
@endsection

@section('page content')
    <table  class="table table-striped mt-4" >
        <thead>
            <tr>
                <th scope="col">Nombre </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tamaños as $tamaño)
            <tr>
                <td>{{ $tamaño->tipo }}</td>
                <td>
                    <form action="{{route('tamaño.destroy',$tamaño->id)}}" method="POST">
                        <a href="tamaños/{{$tamaño->id}}/edit" class="btn btn-info">Editar</a>
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
