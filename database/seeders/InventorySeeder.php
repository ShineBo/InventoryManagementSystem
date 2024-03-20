<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data
        $data = [
            ['product_id' => 1, 'quantity_in_stock' => 50, 'reorder_level' => 10],
            ['product_id' => 2, 'quantity_in_stock' => 30, 'reorder_level' => 5],
            ['product_id' => 3, 'quantity_in_stock' => 20, 'reorder_level' => 10],
            // Add more data as needed
        ];

        // Insert sample data into the database
        foreach ($data as $item) {
            Inventory::create($item);
        }
    }
}
