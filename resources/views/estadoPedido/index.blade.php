@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Estados Pedido
    </h2>
    <a href="{{route('estadoPedido.create')}}" class="btn btn-primary">Crear Estado</a>
@endsection

@section('page content')
    <table  class="table table-striped mt-4" >
        <thead>
            <tr>
                <th scope="col">Nombre </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estados_pedido as $estado)
            <tr>
                <td>{{ $estado->estado }}</td>
                <td>
                    <form action="{{route('estadoPedido.destroy',$estado->id)}}" method="POST">
                        <a href="estados/{{$estado->id}}/edit" class="btn btn-info">Editar</a>
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
