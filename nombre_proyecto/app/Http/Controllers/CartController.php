<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected function currentCart(): Cart
    {
        $user = auth()->user();
        return Cart::firstOrCreate([
            'user_id' => $user->id,
            'status' => Cart::STATUS_OPEN,
        ]);
    }

    public function index()
    {
        $cart = $this->currentCart()->load(['items.product']);
        $subtotal = $cart->items->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });
        return view('cart.index', compact('cart', 'subtotal'));
    }

    public function add(Request $request, Product $product): RedirectResponse
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        if (!$product->active || $product->stock < $data['quantity']) {
            return back()->with('error', 'No hay stock suficiente.');
        }

        $cart = $this->currentCart();
        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ]);

        $item->quantity = ($item->exists ? $item->quantity : 0) + $data['quantity'];
        $item->unit_price = $product->price;
        $item->save();

        return back()->with('success', 'Producto agregado al carrito.');
    }

    public function update(Request $request, CartItem $item): RedirectResponse
    {
        $this->authorizeItem($item);
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);
        if ($item->product->stock < $data['quantity']) {
            return back()->with('error', 'No hay stock suficiente.');
        }
        $item->update(['quantity' => $data['quantity']]);
        return back()->with('success', 'Carrito actualizado.');
    }

    public function remove(CartItem $item): RedirectResponse
    {
        $this->authorizeItem($item);
        $item->delete();
        return back()->with('success', 'Producto eliminado del carrito.');
    }

    public function clear(): RedirectResponse
    {
        $cart = $this->currentCart();
        $cart->items()->delete();
        return back()->with('success', 'Carrito vaciado.');
    }

    protected function authorizeItem(CartItem $item): void
    {
        $cart = $this->currentCart();
        abort_unless($item->cart_id === $cart->id, 403);
    }
}

