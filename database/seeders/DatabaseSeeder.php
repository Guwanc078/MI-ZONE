<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mizone.com',
            'password' => 'Admin123'
        ]);

        Product::create([
            'name' => 'Xiaomi 14 Pro',
            'model' => '16GB/1TB',
            'category' => 'phones',
            'brand' => 'XIAOMI',
            'price' => 45999,
            'stock' => 15,
            'description' => 'Flagship phone'
        ]);

        Product::create([
            'name' => 'Redmi Note 13 Pro+',
            'model' => '12GB/512GB',
            'category' => 'phones',
            'brand' => 'REDMI',
            'price' => 24999,
            'stock' => 25
        ]);

        Product::create([
            'name' => 'iPhone 15 Pro Max',
            'model' => '1TB',
            'category' => 'phones',
            'brand' => 'APPLE',
            'price' => 78999,
            'stock' => 8
        ]);

        Product::create([
            'name' => 'Samsung S24 Ultra',
            'model' => '12GB/1TB',
            'category' => 'phones',
            'brand' => 'SAMSUNG',
            'price' => 68999,
            'stock' => 10
        ]);

        Product::create([
            'name' => 'Google Pixel 8 Pro',
            'model' => '12GB/256GB',
            'category' => 'phones',
            'brand' => 'GOOGLE',
            'price' => 42999,
            'stock' => 12
        ]);

        Product::create([
            'name' => 'Xiaomi Band 8 Pro',
            'model' => 'AMOLED',
            'category' => 'smartwatches',
            'brand' => 'XIAOMI',
            'price' => 3499,
            'stock' => 40
        ]);

        Product::create([
            'name' => 'Apple Watch 9',
            'model' => '45mm GPS',
            'category' => 'smartwatches',
            'brand' => 'APPLE',
            'price' => 18999,
            'stock' => 15
        ]);

        Product::create([
            'name' => 'JBL Quantum 810',
            'model' => 'Wireless',
            'category' => 'headphones',
            'brand' => 'JBL',
            'price' => 5999,
            'stock' => 18
        ]);

        Product::create([
            'name' => 'Sony WH-1000XM5',
            'model' => 'Noise Cancelling',
            'category' => 'headphones',
            'brand' => 'SONY',
            'price' => 12999,
            'stock' => 9
        ]);

        Product::create([
            'name' => 'iPad Pro 12.9',
            'model' => 'M2 Chip',
            'category' => 'tablets',
            'brand' => 'APPLE',
            'price' => 65999,
            'stock' => 5
        ]);

        Product::create([
            'name' => 'Baseus Charger 100W',
            'model' => 'GaN II',
            'category' => 'accessories',
            'brand' => 'BASEUS',
            'price' => 2999,
            'stock' => 35
        ]);

        Product::create([
            'name' => 'MacBook Air M3',
            'model' => '16GB/512GB',
            'category' => 'laptops',
            'brand' => 'APPLE',
            'price' => 78999,
            'stock' => 3
        ]);
    }
}