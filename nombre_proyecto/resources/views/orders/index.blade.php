<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis pedidos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2 px-3">#</th>
                                <th class="py-2 px-3">Fecha</th>
                                <th class="py-2 px-3">Estado</th>
                                <th class="py-2 px-3">Total</th>
                                <th class="py-2 px-3">Items</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            <tr class="border-b">
                                <td class="py-2 px-3">{{ $order->id }}</td>
                                <td class="py-2 px-3">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td class="py-2 px-3">{{ ucfirst($order->status) }}</td>
                                <td class="py-2 px-3">$ {{ number_format($order->total, 2) }}</td>
                                <td class="py-2 px-3">{{ $order->items->sum('quantity') }}</td>
                            </tr>
                        @empty
                            <tr><td class="py-4 px-3" colspan="5">No tienes pedidos todavía.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">{{ $orders->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>

