<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
    h1 { font-size: 20px; margin: 0 0 10px; }
    h2 { font-size: 14px; margin: 16px 0 8px; }
    .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb; padding-bottom: 8px; margin-bottom: 10px; }
    .muted { color: #6b7280; }
    table { width: 100%; border-collapse: collapse; margin-top: 6px; }
    th, td { border-bottom: 1px solid #e5e7eb; padding: 6px; text-align: left; }
    .right { text-align: right; }
    .totals { margin-top: 10px; text-align: right; font-weight: bold; }
  </style>
  <title>Reporte de Ventas</title>
  </head>
  <body>
    <div class="header">
      <div>
        <h1>Reporte de Ventas</h1>
        <div class="muted">Generado: {{ $generatedAt }}</div>
      </div>
      <div style="text-align:right">
        <div style="font-weight:bold; font-size:18px;">Domogas</div>
        <div class="muted">domogas.mx</div>
      </div>
    </div>

    <h2>Ventas por categoría</h2>
    <table>
      <thead>
        <tr>
          <th>Categoría</th>
          <th class="right">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categorySales as $row)
          <tr>
            <td>{{ $row->category }}</td>
            <td class="right">$ {{ number_format($row->total, 2) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="totals">Total vendido: $ {{ number_format($totalSales, 2) }}</div>

    <h2>Pedidos recientes</h2>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Estado</th>
          <th class="right">Total</th>
        </tr>
      </thead>
      <tbody>
        @forelse($orders as $o)
          <tr>
            <td>{{ $o->id }}</td>
            <td>{{ $o->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $o->customer_name }}</td>
            <td>{{ ucfirst($o->status) }}</td>
            <td class="right">$ {{ number_format($o->total, 2) }}</td>
          </tr>
        @empty
          <tr><td colspan="5">Sin pedidos</td></tr>
        @endforelse
      </tbody>
    </table>
  </body>
</html>

