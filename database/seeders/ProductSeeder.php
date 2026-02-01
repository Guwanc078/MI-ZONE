<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Xiaomi 14 Pro',
            'model' => '16GB/512GB',
            'category' => 'telefonlar',
            'brand' => 'Xiaomi',
            'price' => 34999.00,
            'stock' => 15,
            'description' => 'Flagship telefon',
        ]);

        Product::create([
            'name' => 'Redmi Note 13 Pro',
            'model' => '12GB/256GB',
            'category' => 'telefonlar',
            'brand' => 'Redmi',
            'price' => 18499.00,
            'stock' => 25,
            'description' => 'Orta segment lideri',
        ]);

        Product::create([
            'name' => 'Mi Band 8',
            'model' => 'Aktiviteli',
            'category' => 'akilli-saatler',
            'brand' => 'Xiaomi',
            'price' => 2499.00,
            'stock' => 50,
            'description' => 'Akıllı bileklik',
        ]);

        Product::create([
            'name' => 'Baseus Bowie MA10',
            'model' => 'Bluetooth 5.3',
            'category' => 'kulakliklar',
            'brand' => 'Baseus',
            'price' => 899.00,
            'stock' => 40,
            'description' => 'Kablosuz kulaklık',
        ]);
    }
}
