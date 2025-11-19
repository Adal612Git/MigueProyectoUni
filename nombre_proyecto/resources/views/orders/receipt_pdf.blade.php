<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recibo de compra</title>
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
    .header { display:flex; justify-content:space-between; align-items:flex-start; border-bottom:1px solid #e5e7eb; padding-bottom:8px; margin-bottom:12px; }
    .brand { font-size: 22px; font-weight: bold; }
    .muted { color: #6b7280; }
    h1 { font-size: 18px; margin: 0 0 8px; }
    h2 { font-size: 14px; margin: 14px 0 6px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border-bottom: 1px solid #e5e7eb; padding: 6px; text-align: left; }
    .right { text-align: right; }
    .totals { margin-top: 10px; text-align: right; }
  </style>
</head>
<body>
  <div class="header">
    <div class="brand">Domogas</div>
    <div style="text-align:right">
      <div><strong>Recibo de compra</strong></div>
      <div class="muted">Pedido #{{ $order->id }}</div>
      <div class="muted">Generado: {{ $generatedAt }}</div>
    </div>
  </div>

  <table style="width:100%">
    <tr>
      <td style="vertical-align:top; width:50%">
        <h2>Datos del cliente</h2>
        <div><strong>{{ $order->customer_name }}</strong></div>
        <div class="muted">{{ $order->customer_email }}</div>
        @if($order->customer_phone)
          <div class="muted">{{ $order->customer_phone }}</div>
        @endif
      </td>
      <td style="vertical-align:top; width:50%">
        <h2>Dirección de envío</h2>
        <div>{{ $order->address_line1 }}</div>
        @if($order->address_line2)
          <div>{{ $order->address_line2 }}</div>
        @endif
        <div>{{ $order->city }}{{ $order->state ? ', '.$order->state : '' }} {{ $order->postal_code }}</div>
      </td>
    </tr>
  </table>

  <h2>Desglose de la compra</h2>
  <table>
    <thead>
      <tr>
        <th>Producto</th>
        <th class="right">Cant.</th>
        <th class="right">Precio unit.</th>
        <th class="right">Importe</th>
      </tr>
    </thead>
    <tbody>
      @php $subtotal = 0; @endphp
      @foreach($order->items as $item)
        @php $line = (float)$item->quantity * (float)$item->unit_price; $subtotal += $line; @endphp
        <tr>
          <td>{{ $item->product->name ?? ('Producto #'.$item->product_id) }}</td>
          <td class="right">{{ $item->quantity }}</td>
          <td class="right">$ {{ number_format($item->unit_price, 2) }}</td>
          <td class="right">$ {{ number_format($line, 2) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="totals">
    <div>Subtotal: $ {{ number_format($subtotal, 2) }}</div>
    <div><strong>Total: $ {{ number_format($order->total, 2) }}</strong></div>
  </div>

  <p class="muted" style="margin-top:16px">Gracias por su compra.</p>
</body>
</html>

