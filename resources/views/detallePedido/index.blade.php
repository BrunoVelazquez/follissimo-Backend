@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detalles de pedido {{$id}}
    </h2>
@endsection

@section('page content')
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Producto (ID)</th>
                <th scope="col">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles_pedido as $detalle_pedido)
            <tr>
                <td>{{ $detalle_pedido->id }}</td>
                <td>
                    <a href="/productos/{{$detalle_pedido->id_producto}}/show"><u>
                        {{$detalle_pedido->producto->nombre }} ({{$detalle_pedido->id_producto}})
                    </u></a>
                </td>
                <td>{{ $detalle_pedido->cantidad }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
