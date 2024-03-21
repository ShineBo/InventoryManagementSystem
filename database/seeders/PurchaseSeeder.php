<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sample data
        $data = [
            [
                'product_id' => 1,
                'supplier_id' => 1,
                'quantity' => 10,
                'purchase_date' => now(),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample data as needed
        ];

        // Insert data into the purchases table
        DB::table('purchases')->insert($data);
    }
}

