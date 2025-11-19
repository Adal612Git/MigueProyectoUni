<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class SalesController extends Controller
{
    public function index()
    {
        // Ventas por categoría (suma de cantidad * precio)
        $categorySales = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->selectRaw('COALESCE(categories.name, ?) as category, SUM(order_items.quantity * order_items.unit_price) as total', ['Sin categoría'])
            ->groupBy('category')
            ->orderByDesc('total')
            ->get();

        $labels = $categorySales->pluck('category');
        $values = $categorySales->pluck('total');

        // Últimos pedidos
        $orders = Order::withCount('items')
            ->orderByDesc('id')
            ->limit(15)
            ->get();

        $totalSales = (float) DB::table('orders')->sum('total');

        return view('admin.sales.index', compact('labels', 'values', 'orders', 'totalSales'));
    }

    public function exportPdf()
    {
        $categorySales = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->selectRaw('COALESCE(categories.name, ?) as category, SUM(order_items.quantity * order_items.unit_price) as total', ['Sin categoría'])
            ->groupBy('category')
            ->orderByDesc('total')
            ->get();

        $orders = Order::orderByDesc('id')->limit(50)->get();
        $totalSales = (float) DB::table('orders')->sum('total');

        $pdf = Pdf::loadView('admin.sales.pdf', [
            'categorySales' => $categorySales,
            'orders' => $orders,
            'totalSales' => $totalSales,
            'generatedAt' => now()->format('d/m/Y H:i'),
        ])->setPaper('a4');

        return $pdf->download('ventas-'.now()->format('Ymd_His').'.pdf');
    }
}

