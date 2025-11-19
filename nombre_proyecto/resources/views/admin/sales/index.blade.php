<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ventas</h2>
      <a href="{{ route('admin.sales.export.pdf') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
        Exportar PDF
      </a>
    </div>
  </x-slot>

  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-lg font-semibold">Distribución de ventas por categoría</h3>
          <div class="text-sm text-gray-600">Total vendido: $ {{ number_format($totalSales, 2) }}</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="md:col-span-2">
            <canvas id="salesPie"></canvas>
          </div>
          <div>
            <ul class="space-y-2">
              @foreach($labels as $i => $label)
                <li class="flex items-center justify-between border-b pb-1">
                  <span class="text-sm">{{ $label }}</span>
                  <span class="text-sm font-semibold">$ {{ number_format($values[$i], 2) }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">Pedidos recientes</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left">
            <thead>
              <tr class="border-b">
                <th class="py-2 px-3">#</th>
                <th class="py-2 px-3">Fecha</th>
                <th class="py-2 px-3">Cliente</th>
                <th class="py-2 px-3">Estado</th>
                <th class="py-2 px-3">Items</th>
                <th class="py-2 px-3">Total</th>
              </tr>
            </thead>
            <tbody>
              @forelse($orders as $order)
                <tr class="border-b">
                  <td class="py-2 px-3">{{ $order->id }}</td>
                  <td class="py-2 px-3">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                  <td class="py-2 px-3">{{ $order->customer_name }}</td>
                  <td class="py-2 px-3">{{ ucfirst($order->status) }}</td>
                  <td class="py-2 px-3">{{ $order->items_count }}</td>
                  <td class="py-2 px-3">$ {{ number_format($order->total, 2) }}</td>
                </tr>
              @empty
                <tr><td class="py-4 px-3" colspan="6">No hay pedidos registrados.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
  <script>
    const ctx = document.getElementById('salesPie');
    const labels = @json($labels);
    const data = @json($values);
    const colors = [
      '#4F46E5','#EF4444','#22C55E','#F59E0B','#06B6D4','#8B5CF6','#EC4899','#10B981','#3B82F6','#F97316'
    ];
    const background = data.map((_, i) => colors[i % colors.length]);
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          label: 'Ventas por categoría',
          data: data,
          backgroundColor: background,
          borderWidth: 1,
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'bottom' },
        }
      }
    });
  </script>
</x-app-layout>

