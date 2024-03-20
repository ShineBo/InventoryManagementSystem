<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'John Doe',
            'location' => 'New York',
            'phone' => '123-456-7890',
            'email' => 'john@example.com',
        ]);

        Customer::create([
            'name' => 'Jane Smith',
            'location' => 'Los Angeles',
            'phone' => '987-654-3210',
            'email' => 'jane@example.com',
        ]);
    }
}
