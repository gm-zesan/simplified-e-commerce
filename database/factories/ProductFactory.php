<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'old_price' => $this->faker->randomFloat(2, 10, 100),
            'new_price' => $this->faker->randomFloat(2, 10, 100),
            'image' => 'products/' . Str::random(40) . '.jpg',
            'category_id' => Category::factory(),
            'subcategory_id' => Subcategory::factory(),
        ];
    }
}
