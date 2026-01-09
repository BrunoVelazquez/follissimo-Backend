@extends('layouts.app')

@section('header')
    <h2>
        Editor Categorias
    </h2>
@endsection

@section('page content')
        <form action="/categorias/{{$categoria->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre categoria</label>
                <input type="text" class="form-control" name="Nombre" tabindex="1" value="{{$categoria->tipo}}" required>
                @error('Nombre')
                    <div class="invalid-feedback d-block" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-outline-success" tabindex="7">Guardar cambios</button>
            <a href="/categorias" class="btn btn-outline-danger" tabindex="8">Cancelar</a>
        </form>
@endsection
