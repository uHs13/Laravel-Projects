<?php

namespace Database\Seeders;

use Database\Seeders\RelashionshipsSeeder;
use Database\Seeders\DevelopersSeeder;
use Database\Seeders\ProjectsSeeder;
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
            ProjectsSeeder::class,
            DevelopersSeeder::class,
            RelashionshipsSeeder::class
        ]);
    }
}