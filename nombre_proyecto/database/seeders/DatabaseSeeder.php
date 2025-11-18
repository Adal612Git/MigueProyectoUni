<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::query()->updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Sample categories
        $categorias = [
            ['name' => 'Hogar', 'slug' => 'hogar', 'description' => 'Productos para el hogar'],
            ['name' => 'Cocina', 'slug' => 'cocina', 'description' => 'Utensilios y más'],
            ['name' => 'Tecnología', 'slug' => 'tecnologia', 'description' => 'Gadgets y accesorios'],
        ];
        foreach ($categorias as $c) {
            Category::updateOrCreate(['slug' => $c['slug']], $c);
        }

        $hogar = Category::where('slug', 'hogar')->first();
        $cocina = Category::where('slug', 'cocina')->first();
        $tec = Category::where('slug', 'tecnologia')->first();

        // Sample products
        $productos = [
            ['name' => 'Vaso térmico', 'slug' => 'vaso-termico', 'price' => 199.90, 'stock' => 50, 'category_id' => $cocina?->id, 'description' => 'Mantiene tus bebidas a la temperatura ideal.'],
            ['name' => 'Lámpara LED', 'slug' => 'lampara-led', 'price' => 299.00, 'stock' => 30, 'category_id' => $hogar?->id, 'description' => 'Iluminación eficiente y moderna.'],
            ['name' => 'Auriculares inalámbricos', 'slug' => 'auriculares-inalambricos', 'price' => 799.00, 'stock' => 20, 'category_id' => $tec?->id, 'description' => 'Sonido de alta fidelidad sin cables.'],
        ];
        foreach ($productos as $p) {
            Product::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}

