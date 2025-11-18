<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar producto</h2>
            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('¿Eliminar producto?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 bg-red-600 text-white rounded">Eliminar</button>
            </form>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="grid gap-4 md:grid-cols-2">
                    @csrf
                    @method('PUT')
                    <div class="md:col-span-2">
                        <label class="block text-sm">Nombre</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="border rounded w-full px-3 py-2">
                        @error('name') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" class="border rounded w-full px-3 py-2">
                        @error('slug') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Categoría</label>
                        <select name="category_id" class="border rounded w-full px-3 py-2">
                            <option value="">Sin categoría</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id)==$cat->id)>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm">Descripción</label>
                        <textarea name="description" rows="4" class="border rounded w-full px-3 py-2">{{ old('description', $product->description) }}</textarea>
                        @error('description') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Precio</label>
                        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price) }}" class="border rounded w-full px-3 py-2">
                        @error('price') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm">Stock</label>
                        <input type="number" min="0" name="stock" value="{{ old('stock', $product->stock) }}" class="border rounded w-full px-3 py-2">
                        @error('stock') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm">Imagen</label>
                        <input type="file" name="image" class="border rounded w-full px-3 py-2">
                        @error('image') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                        @if($product->image_path)
                            <img src="/{{ $product->image_path }}" alt="{{ $product->name }}" class="mt-2 w-48 rounded">
                        @endif
                    </div>
                    <div>
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="active" value="1" @checked(old('active', $product->active))> Activo</label>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end gap-3">
                        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-200 rounded">Volver</a>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

