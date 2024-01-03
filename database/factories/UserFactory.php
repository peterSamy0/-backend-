<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement(['admin', 'صاحب محل', 'عميل']),
            'address' => $this->faker->address,
            'governorate_id' =>  $this->faker->randomElement([1, 2, 3]),
            'city_id' =>  $this->faker->randomElement([1, 2, 3, 4 ,5]),
            'shop_category_id' => function () {
                return \App\Models\ShopCategory::factory()->create()->id;
            },
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Change 'password' to your desired default password
            'cover_image' => $this->faker->imageUrl(),
            'profile_image' => $this->faker->imageUrl(),
            'payment' => $this->faker->boolean,
            'remember_token' => \Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
