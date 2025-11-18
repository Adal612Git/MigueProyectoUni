<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categorías</h2>
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Nueva categoría</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-3">ID</th>
                                <th class="py-2 px-3">Nombre</th>
                                <th class="py-2 px-3">Slug</th>
                                <th class="py-2 px-3">Activa</th>
                                <th class="py-2 px-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $cat)
                            <tr class="border-b">
                                <td class="py-2 px-3">{{ $cat->id }}</td>
                                <td class="py-2 px-3">{{ $cat->name }}</td>
                                <td class="py-2 px-3">{{ $cat->slug }}</td>
                                <td class="py-2 px-3">{{ $cat->active ? 'Sí' : 'No' }}</td>
                                <td class="py-2 px-3 text-right">
                                    <a href="{{ route('admin.categories.edit', $cat) }}" class="px-3 py-1 bg-gray-100 rounded">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">{{ $categories->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>

