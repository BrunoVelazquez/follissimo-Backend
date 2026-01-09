@extends('layouts.app')

@section('header')
    <h2>Create Tamaño</h2>
@endsection

@section('page content')
        <form action="/tamaños" method="POST">
            @csrf
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre tamaño</label>
                <input type="text" class="form-control" name="Nombre" tabindex="1" required>
                @error('Nombre')
                    <div class="invalid-feedback d-block" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-success" tabindex="7">Crear</button>
            <a href="/tamaños" class="btn btn-outline-danger" tabindex="8">Cancelar</a>
        </form>
@endsection
