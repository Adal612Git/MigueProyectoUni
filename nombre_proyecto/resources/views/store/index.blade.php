<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Catálogo
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="GET" class="mb-6 grid gap-4 md:grid-cols-3">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar productos..." class="border rounded px-3 py-2 w-full">
                    <select name="category" class="border rounded px-3 py-2 w-full">
                        <option value="">Todas las categorías</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}" @selected(request('category')===$cat->slug)>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white rounded px-4 py-2">Filtrar</button>
                </form>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product)
                        <a href="{{ route('store.show', $product) }}" class="border rounded-lg overflow-hidden hover:shadow-md transition">
                            <div class="aspect-[4/3] bg-gray-100">
                                @if($product->image_path)
                                    <img src="/{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500 line-clamp-2">{{ \Illuminate\Support\Str::limit($product->description, 120) }}</p>
                                <p class="mt-2 font-bold text-indigo-700">$ {{ number_format($product->price, 2) }}</p>
                            </div>
                        </a>
                    @empty
                        <p>No hay productos disponibles.</p>
                    @endforelse
                </div>

                <div class="mt-6">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
