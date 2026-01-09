@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Clientes
    </h2>
@endsection

@section('page content')
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Dirección</th>
                <th scope="col">E-mail</th>
                <th scope="col">Cantidad Pedidos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->email}}</td>
                <td>{{ $cantidad_pedidos_por_cliente[$cliente->id]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
