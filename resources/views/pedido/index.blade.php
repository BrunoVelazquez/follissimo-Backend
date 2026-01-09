@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Pedidos
    </h2>
@endsection

@section('page content')
    <table id="tablaFiltrable" class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Monto Total</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cliente</th>
                <th scope="col">Estado</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->monto_total }}</td>
                <td>{{ date('d-m-Y', strtotime($pedido->fecha)); }}</td>
                <td>{{ $pedido->cliente->nombre}} {{$pedido->cliente->apellido}}</td>
                <td>{{ $pedido->estado->estado }}</td>
                <td><a href="pedidos/{{$pedido->id}}/index" class="btn btn-info">Ver más</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
