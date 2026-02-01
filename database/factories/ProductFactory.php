<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'brand_id' => Brand::inRandomOrder()->first()->id ?? Brand::factory(),
            'name' => $this->faker->words(3, true),
            'slug' => $this->faker->slug,
            'model' => $this->faker->bothify('Mi ##??'),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(1000, 10000),
            'old_price' => $this->faker->boolean(30) ? $this->faker->numberBetween(1200, 12000) : null,
            'stock' => $this->faker->numberBetween(0, 100),
            'image' => 'products/' . $this->faker->image('public/storage/products', 640, 480, 'technics', false),
            'specifications' => json_encode([
                'Ekran' => '6.5" AMOLED',
                'İşlemci' => 'Snapdragon 888',
                'RAM' => '8GB',
                'Depolama' => '128GB',
                'Pil' => '5000mAh',
                'Kamera' => '108MP Ana + 8MP Ultra Geniş + 5MP Makro'
            ]),
            'is_featured' => $this->faker->boolean(30),
            'is_active' => true,
            'view_count' => $this->faker->numberBetween(0, 1000)
        ];
    }
}