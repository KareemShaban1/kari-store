<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Store;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->productName;
        return [
            //
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(15),
            'image' => $this->faker->imageUrl,
            'price' => $this->faker->randomFloat(1, 1, 499),
            'compare_price' => $this->faker->randomFloat(1, 500, 999),
            'quantity' => rand(1, 100),
            'featured' => rand(0, 1),
            'category_id' => Category::inRandomOrder()->first()->id,
            'store_id' => Store::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,

        ];
    }
}
