<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carrito de compras
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="mb-4 p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
                @endif

                @if($cart->items->isEmpty())
                    <p>Tu carrito está vacío.</p>
                @else
                <div class="space-y-4">
                    @foreach($cart->items as $item)
                        <div class="flex items-center justify-between border rounded p-3">
                            <div class="flex items-center gap-3">
                                <div class="w-20 h-16 bg-gray-100 rounded overflow-hidden">
                                    @if($item->product->image_path)
                                        <img src="/{{ $item->product->image_path }}" class="w-full h-full object-cover" alt="">
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('store.show', $item->product) }}" class="font-medium text-gray-800 hover:underline">{{ $item->product->name }}</a>
                                    <p class="text-sm text-gray-500">$ {{ number_format($item->unit_price, 2) }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" min="1" value="{{ $item->quantity }}" class="border rounded px-2 py-1 w-20">
                                    <button class="px-3 py-1 bg-indigo-600 text-white rounded">Actualizar</button>
                                </form>
                                <form action="{{ route('cart.remove', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 flex items-center justify-between">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-gray-200 rounded">Vaciar carrito</button>
                    </form>
                    <div class="text-right">
                        <p class="text-lg">Subtotal: <span class="font-semibold">$ {{ number_format($subtotal, 2) }}</span></p>
                        <a href="{{ route('checkout.index') }}" class="inline-block mt-3 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded">Proceder al pago</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

