<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class FakeProductsSeeder extends Seeder
{
    public function run()
    {
        // جلب البيانات من Fake Store API
        $response = Http::get('https://fakestoreapi.com/products');
        $products = $response->json();

        foreach ($products as $item) {
           Product::create([
    'title' => $item['title'],
    'price' => $item['price'],
    'description' => $item['description'],
    'image' => $item['image'],
    'category' => $item['category'],
    'quantity' => rand(1, 50), // عدد افتراضي
]);

        }

        $this->command->info('Products imported successfully!');
    }
}
