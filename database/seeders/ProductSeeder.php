<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    public function run() {
        Product::insert([
            [
                'name' => 'Brown Dress',
                'brand' => 'Gucci',
                'description' => 'Stylish dress with premium quality',
                'price' => 59.00,
                'discount_price' => 39.00,
                'image' => 'images/products/main_page_product.jpeg',
            ],
            [
               'name' => 'Brown Dress',
                'brand' => 'Gucci',
                'description' => 'Stylish dress with premium quality',
                'price' => 59.00,
                'discount_price' => 39.00,
                'image' => 'images/products/main_page_product.jpeg',
            
            ],
            [
                'name' => 'Brown Dress',
                'brand' => 'Gucci',
                'description' => 'Stylish dress with premium quality',
                'price' => 59.00,
                'discount_price' => 39.00,
                'image' => 'images/products/main_page_product.jpeg',
          
            ],
            [
               'name' => 'Brown Dress',
                'brand' => 'Gucci',
                'description' => 'Stylish dress with premium quality',
                'price' => 59.00,
                'discount_price' => 39.00,
                'image' => 'images/products/main_page_product.jpeg',
            ],
        ]);
    }
}
