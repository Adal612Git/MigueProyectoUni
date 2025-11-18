<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <div class="aspect-[4/3] bg-gray-100 rounded">
                            @if($product->image_path)
                                <img src="/{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded">
                            @endif
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h1>
                        <p class="mt-2 text-gray-600">{{ $product->description }}</p>
                        <p class="mt-4 text-2xl text-indigo-700 font-semibold">$ {{ number_format($product->price, 2) }}</p>
                        <p class="mt-1 text-sm text-gray-500">Stock: {{ $product->stock }}</p>

                        @auth
                        <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-6 flex items-center gap-3">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="border rounded px-3 py-2 w-24">
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white rounded px-4 py-2">Agregar al carrito</button>
                        </form>
                        @else
                            <p class="mt-6 text-sm">Inicia sesión para comprar.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

