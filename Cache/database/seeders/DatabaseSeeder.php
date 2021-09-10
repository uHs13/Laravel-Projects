<?php

namespace Database\Seeders;

use Database\Seeders\ProductsCategoriesSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\ProductsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesSeeder::class,
            ProductsSeeder::class,
            ProductsCategoriesSeeder::class
        ]);
    }
}
