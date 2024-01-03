<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\userTableSeeder;
use Database\Seeders\ProductsTableSeeder;
use Database\Seeders\ShopCategoriesTableSeeder;
use Database\Seeders\ProductCategoriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(ProductCategoriesTableSeeder::class);
        // $this->call(ShopCategoriesTableSeeder::class);
        // $this->call(userTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
