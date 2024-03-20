<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Product 1', 'description' => 'Sample description for Product 1', 'price' => 19.99, 'category_id' => 1],
            ['name' => 'Product 2', 'description' => 'Sample description for Product 2', 'price' => 29.99, 'category_id' => 1],
            ['name' => 'Product 3', 'description' => 'Sample description for Product 3', 'price' => 39.99, 'category_id' => 2],
            // Add more products as needed
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category_id' => $product['category_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
