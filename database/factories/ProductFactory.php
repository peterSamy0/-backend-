<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userRole = $this->faker->randomElement(['admin', 'صاحب محل', 'عميل']);

        $userFactory = function () use ($userRole) {
            return User::factory(['role' => $userRole])->create()->id;
        };

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->unique()->slug,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'user_id' => $userRole === 'صاحب محل' ? $userFactory : 1,
            'product_category_id' =>  $this->faker->randomElement([1, 2, 3, 4 ,5]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
