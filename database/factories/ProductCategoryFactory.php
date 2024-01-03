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
        $faker = \Faker\Factory::create();
        $slugify = new Slugify();

        return [
            'name' => $name = $faker->word, // Corrected this line
            'slug' => $slug = $slugify->slugify($name), // Corrected this line
        ];
    }
}
