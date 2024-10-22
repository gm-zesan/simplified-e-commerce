<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Zesan',
            'email' => 'gmzesan7767@gmail.com',
            'password' => bcrypt('12345678aA'),
        ]);

        $categories = Category::factory(5)->create();

        foreach ($categories as $category) {
            $subcategories = Subcategory::factory(2)->create(['category_id' => $category->id]);
            foreach ($subcategories as $subcategory) {
                Product::factory(3)->create([
                    'category_id' => $category->id,
                    'subcategory_id' => $subcategory->id,
                ]);
            }
        }

    }
}
