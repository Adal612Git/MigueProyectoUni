<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SalesController as AdminSalesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rutas públicas y privadas de la tienda
|--------------------------------------------------------------------------
*/

// RUTAS PÚBLICAS
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/soluciones', function () {
    return view('landing.soluciones');
})->name('soluciones');

Route::get('/empresa', function () {
    return view('empresa');
})->name('empresa');

// Catálogo y productos
Route::get('/tienda', [ProductController::class, 'index'])->name('store.index');
Route::get('/producto/{product:slug}', [ProductController::class, 'show'])->name('store.show');

// RUTAS PRIVADAS (requieren autenticación y verificación email)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Carrito
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
    Route::post('/carrito/agregar/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/carrito/item/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/carrito/item/{item}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/carrito', [CartController::class, 'clear'])->name('cart.clear');

    // Checkout y pedidos
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'place'])->name('checkout.place');
    Route::get('/mis-pedidos', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/mis-pedidos/{order}/recibo.pdf', [OrderController::class, 'receiptPdf'])->name('orders.receipt.pdf');
});

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () { return redirect()->route('admin.products.index'); })->name('home');
    Route::resource('products', AdminProductController::class)->except(['show']);
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
    // Ventas
    Route::get('ventas', [AdminSalesController::class, 'index'])->name('sales.index');
    Route::get('ventas/export/pdf', [AdminSalesController::class, 'exportPdf'])->name('sales.export.pdf');
});

// Auth (Laravel Breeze)
require __DIR__.'/auth.php';
