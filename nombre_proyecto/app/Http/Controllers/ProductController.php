<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->where('active', true);

        if ($search = $request->string('q')->toString()) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($categorySlug = $request->string('category')->toString()) {
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $products = $query->orderByDesc('id')->paginate(12)->withQueryString();
        $categories = Category::where('active', true)->orderBy('name')->get();

        return view('store.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        abort_unless($product->active, 404);
        return view('store.show', compact('product'));
    }
}

