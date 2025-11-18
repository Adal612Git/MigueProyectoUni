<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Productos</h2>
            <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Nuevo producto</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-3">ID</th>
                                <th class="py-2 px-3">Nombre</th>
                                <th class="py-2 px-3">Categoría</th>
                                <th class="py-2 px-3">Precio</th>
                                <th class="py-2 px-3">Stock</th>
                                <th class="py-2 px-3">Activo</th>
                                <th class="py-2 px-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                                <tr class="border-b">
                                    <td class="py-2 px-3">{{ $p->id }}</td>
                                    <td class="py-2 px-3">{{ $p->name }}</td>
                                    <td class="py-2 px-3">{{ $p->category?->name ?? '-' }}</td>
                                    <td class="py-2 px-3">$ {{ number_format($p->price, 2) }}</td>
                                    <td class="py-2 px-3">{{ $p->stock }}</td>
                                    <td class="py-2 px-3">{{ $p->active ? 'Sí' : 'No' }}</td>
                                    <td class="py-2 px-3 text-right">
                                        <a href="{{ route('admin.products.edit', $p) }}" class="px-3 py-1 bg-gray-100 rounded">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>

