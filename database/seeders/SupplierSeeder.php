<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'supplier_name' => 'ABC Supplier',
            'supplier_contact_info' => 'Email: abc@example.com',
            'phone_number' => '0933949493',
        ]);

        Supplier::create([
            'supplier_name' => 'XYZ Supplier',
            'supplier_contact_info' => 'Email: xyz@example.com',
            'phone_number' => '0933539493',
        ]);
    }
}
