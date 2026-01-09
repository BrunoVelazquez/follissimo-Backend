@extends('layouts.app')

@section('header')
    <h2>
        Editor Productos
    </h2>
@endsection

@section('page content')
        <form action="/productos/{{$producto->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre producto</label>
                <input type="text" class="form-control" name="Nombre" tabindex="1" value="{{$producto->nombre}}" required>
                @error('Nombre')
                    <div class="invalid-feedback d-block" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="number" class="form-control" name="Precio" tabindex="2" value="{{$producto->precio}}" required>
                @error('Precio')
                    <div class="invalid-feedback d-block" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Color" class="form-label">Color</label>
                <input type="text" class="form-control" name="Color" tabindex="3" value="{{$producto->color}}" required>
                @error('Descripcion')
                    <div class="invalid-feedback d-block" role="alert">
                        {{$message}}
                    </div>
                @enderror            
            </div>

            <div class="mb-3">
                <label> Categoria:</label>
                <select class="form-select" aria-label="Default select example" name="Categoria" tabindex="4">
                    @foreach ($categorias as $categoria)
                        @if ($categoria->tipo == $producto->tipo_categoria)
                            <option selected>{{ $categoria->tipo }}</option>
                        @else
                            <option>{{ $categoria->tipo }}</option>
                        @endif
                    @endforeach
            </select>
            </div>
            <div class="mb-3">
                <label> Tamaño:</label>
                <select class="form-select" aria-label="Default select example" name="Tamaño" tabindex="5">
                    @foreach ($tamaños as $tamaño)
                        @if ($tamaño->tipo == $producto->tipo_tamaño)
                            <option selected>{{ $tamaño->tipo }}</option>
                        @else
                            <option>{{ $tamaño->tipo }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="Descripcion" tabindex="6" value="{{$producto->descripción}}" required>
                @error('Descripcion')
                    <div class="invalid-feedback d-block" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" name="imagen" tabindex="9">
             @error('imagen')
               <div class="invalid-feedback d-block" role="alert">
                {{$message}}
                </div>
               @enderror
            </div>

            <button type="submit" class="btn btn-outline-success" tabindex="7">Guardar cambios</button>
            <a href="/productos" class="btn btn-outline-danger" tabindex="8">Cancelar</a>
        </form>
@endsection
