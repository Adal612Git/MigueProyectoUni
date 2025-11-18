<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva categoría</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('admin.categories.store') }}" class="grid gap-4">
                    @csrf
                    <div>
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
                        <label class="block text-sm">Descripción</label>
                        <textarea name="description" rows="4" class="border rounded w-full px-3 py-2">{{ old('description') }}</textarea>
                        @error('description') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="active" value="1" checked> Activa</label>
                    </div>
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-gray-200 rounded">Cancelar</a>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

