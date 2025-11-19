<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')
            ->where('user_id', auth()->id())
            ->orderByDesc('id')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function receiptPdf(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);

        $order->load('items.product', 'user');

        $pdf = Pdf::loadView('orders.receipt_pdf', [
            'order' => $order,
            'generatedAt' => now()->format('d/m/Y H:i'),
        ])->setPaper('a4');

        return $pdf->download('recibo-pedido-'.$order->id.'.pdf');
    }
}
