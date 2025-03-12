<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            ['name' => 'Laptop Asus', 'price' => 7500000, 'stock' => 10],
            ['name' => 'Mouse Logitech', 'price' => 250000, 'stock' => 30],
            ['name' => 'Keyboard Mechanical', 'price' => 600000, 'stock' => 15],
            ['name' => 'Monitor 24 Inch', 'price' => 2000000, 'stock' => 8],
            ['name' => 'Flashdisk 32GB', 'price' => 120000, 'stock' => 50],
        ]);
    }
}
