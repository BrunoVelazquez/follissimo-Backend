<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->id }} - {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="card mb-3" style="max-width: 840px;">
                            <div class="row g-0">

                            <div class="col-md-4">
                                    @if ($product->image)
                                        <img src="{{ $product->image }}" class="img-fluid" alt="Imagen del producto">
                                    @else
                                        <p>Sin imagen</p>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                            <h5 class="card-title">Nombre: {{$product->name}}</h5>
                                            <p class="card-text">Precio: {{ $product->price }} </p>
                                            <p class="card-text">Descripción: {{ $product->description }} </p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
