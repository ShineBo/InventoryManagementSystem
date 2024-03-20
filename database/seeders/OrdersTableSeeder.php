<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'customer_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
        ]);

        Order::create([
            'customer_id' => 2,
            'product_id' => 2,
            'quantity' => 1,
        ]);
    }
}
