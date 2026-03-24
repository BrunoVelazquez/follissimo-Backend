<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mr-auto">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="w-1/2">
                        @csrf
                        @method("PUT")
                        <div class="mb-4">
                            <x-input-label for="name" value="{{ __('Nombre') }}" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $product->name) }}" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="price" value="{{ __('Precio') }}" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" value="{{ __('Descripción') }}" />
                            <textarea id="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-100" name="description" required>{{ old('description', $product->description) }} </textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-2 gap-x-4 mb-4">
                            <div class="mb-4">
                                <x-input-label for="category_id" value="{{ __('Categoría') }}" />
                                <x-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                        <button type="button" class="flex items-center justify-between mt-1 w-full text-left border border-gray-300 dark:border-gray-700 rounded-md shadow-sm px-3 py-2 dark:bg-gray-700 dark:text-gray-100">
                                            <span id="category_label">
                                                {{ $categories->firstWhere('id', old('category_id'), $product->category_id)?->name ?? 'Seleccionar categoría...' }}
                                            </span>
                                            <svg class="h-5 w-5 text-gray-400 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        @foreach ($categories as $category)
                                            <x-dropdown-link
                                                href="#"
                                                onclick="document.getElementById('category_id').value = '{{ $category->id }}'; document.getElementById('category_label').innerText = '{{ $category->name }}'; return false;"
                                            >
                                                {{ $category->name }}
                                            </x-dropdown-link>
                                        @endforeach
                                    </x-slot>
                                </x-dropdown>
                                <input type="text" id="category_id" name="category_id" value="{{ old('category_id', $product->category_id) }}" class="opacity-0 absolute w-0 h-0 pointer-events-none" required oninvalid="this.setCustomValidity('Por favor, selecciona una categoría')" oninput="this.setCustomValidity('')">
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="size_id" value="{{ __('Talle') }}" />
                                <x-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                        <button type="button" class="flex items-center justify-between mt-1 w-full text-left border border-gray-300 dark:border-gray-700 rounded-md shadow-sm px-3 py-2 dark:bg-gray-700 dark:text-gray-100">
                                            <span id="size_label">
                                                {{ $sizes->firstWhere('id', old('size_id'), $product->size_id)?->name ?? 'Seleccionar talle...' }}
                                            </span>
                                            <svg class="h-5 w-5 text-gray-400 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        @foreach ($sizes as $size)
                                            <x-dropdown-link
                                                href="#"
                                                onclick="document.getElementById('size_id').value = '{{ $size->id }}'; document.getElementById('size_label').innerText = '{{ $size->name }}'; return false;"
                                            >
                                                {{ $size->name }}
                                            </x-dropdown-link>
                                        @endforeach
                                    </x-slot>
                                </x-dropdown>
                                <input type="text" id="size_id" name="size_id" value="{{ old('size_id', $product->size_id) }}" class="opacity-0 absolute w-0 h-0 pointer-events-none" required oninvalid="this.setCustomValidity('Por favor, selecciona un talle')" oninput="this.setCustomValidity('')">
                                <x-input-error :messages="$errors->get('size_id')" class="mt-2" />
                            </div>

                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button
                                class="bg-green-600 hover:bg-green-700 focus:ring-green-500 cursor-pointer"
                            >
                                {{ __('Guardar') }}
                            </x-primary-button>
                            <a href="{{ route('products.index') }}" class="">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
