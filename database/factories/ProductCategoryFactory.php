<?php

namespace Database\Factories;

use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, 
            'slug' => $this->faker->unique()->slug,

        ];
    }
}
