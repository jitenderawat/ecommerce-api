<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'name' => 'Sample Product 1',
            'description' => 'This is a description for sample product 1.',
            'price' => 19.99,
            'quantity' => 10,
           
        ]);

        Product::create([
            'name' => 'Sample Product 2',
            'description' => 'This is a description for sample product 2.',
            'price' => 29.99,
            'quantity' => 20,
           
        ]);

        Product::create([
            'name' => 'Sample Product 3',
            'description' => 'This is a description for sample product 3.',
            'price' => 39.99,
            'quantity' => 30,
            
        ]);
    }
}
