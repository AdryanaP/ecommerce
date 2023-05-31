<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productQuery = Http::get('https://dummyjson.com/products')->json();
        $productData = collect($productQuery['products']);
        
        info($productData);
        foreach ($productData as $product) {
            Product::create([
                'seller_id' =>  $product['id'],
                'slug' => str_replace(" ","-", $product['title']),
                'name' => $product['title'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category' => $product['category'],
                'images' => json_encode($product['images']),
            ]);
        }
    }
}
