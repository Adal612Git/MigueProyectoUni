<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo producto</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
                    @csrf
                    <div class="md:col-span-2">
                        <label class="block text-sm">Nombre</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full px-3 py-2">
                        @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="border rounded w-full px-3 py-2">
                        @error('slug') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Categoría</label>
                        <select name="category_id" class="border rounded w-full px-3 py-2">
                            <option value="">Sin categoría</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @selected(old('category_id')==$cat->id)>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm">Descripción</label>
                        <textarea name="description" rows="4" class="border rounded w-full px-3 py-2">{{ old('description') }}</textarea>
                        @error('description') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Precio</label>
                        <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}" class="border rounded w-full px-3 py-2">
                        @error('price') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Stock</label>
                        <input type="number" min="0" name="stock" value="{{ old('stock', 0) }}" class="border rounded w-full px-3 py-2">
                        @error('stock') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm">Imagen</label>
                        <input type="file" name="image" class="border rounded w-full px-3 py-2">
                        @error('image') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="active" value="1" checked> Activo</label>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end gap-3">
                        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-200 rounded">Cancelar</a>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

