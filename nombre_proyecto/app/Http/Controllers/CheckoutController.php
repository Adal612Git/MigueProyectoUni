<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with(['items.product'])
            ->where('user_id', auth()->id())
            ->where('status', Cart::STATUS_OPEN)
            ->first();

        abort_if(!$cart || $cart->items->isEmpty(), 404);

        $subtotal = $cart->items->sum(fn ($i) => $i->quantity * $i->unit_price);
        return view('checkout.index', compact('cart', 'subtotal'));
    }

    public function place(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email'],
            'customer_phone' => ['nullable', 'string', 'max:50'],
            'address_line1' => ['required', 'string', 'max:255'],
            'address_line2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:20'],
        ]);

        $cart = Cart::with(['items.product'])
            ->where('user_id', auth()->id())
            ->where('status', Cart::STATUS_OPEN)
            ->firstOrFail();

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
        }

        return DB::transaction(function () use ($cart, $data) {
            $total = $cart->items->sum(fn ($i) => $i->quantity * $i->unit_price);

            foreach ($cart->items as $item) {
                if ($item->product->stock < $item->quantity) {
                    return redirect()->route('cart.index')
                        ->with('error', 'Stock insuficiente para ' . $item->product->name);
                }
            }

            $order = Order::create(array_merge($data, [
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => Order::STATUS_PENDING,
            ]));

            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                ]);

                $item->product->decrement('stock', $item->quantity);
            }

            $cart->update(['status' => Cart::STATUS_CONVERTED]);
            $cart->items()->delete();

            return redirect()->route('orders.index')->with('success', 'Pedido realizado correctamente.');
        });
    }
}

