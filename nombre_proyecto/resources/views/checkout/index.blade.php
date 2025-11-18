<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Checkout
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Datos del cliente</h3>
                <form method="POST" action="{{ route('checkout.place') }}" class="grid gap-4 md:grid-cols-2">
                    @csrf
                    <div>
                        <label class="block text-sm text-gray-600">Nombre completo</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name', auth()->user()->name) }}" class="border rounded w-full px-3 py-2">
                        @error('customer_name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Email</label>
                        <input type="email" name="customer_email" value="{{ old('customer_email', auth()->user()->email) }}" class="border rounded w-full px-3 py-2">
                        @error('customer_email')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Teléfono</label>
                        <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" class="border rounded w-full px-3 py-2">
                        @error('customer_phone')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="md:col-span-2 mt-2"><h3 class="text-lg font-semibold">Dirección</h3></div>
                    <div class="md:col-span-2">
                        <label class="block text-sm text-gray-600">Dirección</label>
                        <input type="text" name="address_line1" value="{{ old('address_line1') }}" class="border rounded w-full px-3 py-2">
                        @error('address_line1')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm text-gray-600">Complemento</label>
                        <input type="text" name="address_line2" value="{{ old('address_line2') }}" class="border rounded w-full px-3 py-2">
                        @error('address_line2')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Ciudad</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="border rounded w-full px-3 py-2">
                        @error('city')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Estado/Provincia</label>
                        <input type="text" name="state" value="{{ old('state') }}" class="border rounded w-full px-3 py-2">
                        @error('state')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600">Código postal</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="border rounded w-full px-3 py-2">
                        @error('postal_code')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2 mt-4 flex items-center justify-between">
                        <p class="text-lg">Total: <span class="font-semibold">$ {{ number_format($subtotal, 2) }}</span></p>
                        <button class="bg-emerald-600 hover:bg-emerald-700 text-white rounded px-5 py-2">Confirmar pedido</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

