<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderByDesc('id')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('active', true)->orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
            'active' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        $data['active'] = (bool) ($data['active'] ?? true);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $dest = public_path('uploads/products');
            if (!is_dir($dest)) {
                mkdir($dest, 0775, true);
            }
            $image->move($dest, $fileName);
            $imagePath = 'uploads/products/' . $fileName;
        }

        $product = Product::create(array_merge($data, [
            'image_path' => $imagePath,
        ]));

        return redirect()->route('admin.products.edit', $product)->with('success', 'Producto creado.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('active', true)->orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
            'active' => ['nullable', 'boolean'],
        ]);

        $data['active'] = (bool) ($data['active'] ?? false);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $dest = public_path('uploads/products');
            if (!is_dir($dest)) {
                mkdir($dest, 0775, true);
            }
            $image->move($dest, $fileName);
            $data['image_path'] = 'uploads/products/' . $fileName;
        }

        $product->update($data);
        return redirect()->route('admin.products.edit', $product)->with('success', 'Producto actualizado.');
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Producto eliminado.');
        } catch (\Throwable $e) {
            return redirect()->route('admin.products.index')->with('error', 'No se puede eliminar el producto porque tiene dependencias.');
        }
    }
}
