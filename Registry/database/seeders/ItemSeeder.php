<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('items')->insert([
            'name' => 'T-Shirt',
            'stock' => '100',
            'storage_id' => '5'
        ]);

        DB::table('items')->insert([
            'name' => 'Nike Running',
            'stock' => '60',
            'storage_id' => '5'
        ]);

        DB::table('items')->insert([
            'name' => 'Cement Package',
            'stock' => '80',
            'storage_id' => '4'
        ]);

        DB::table('items')->insert([
            'name' => 'Red Brick',
            'stock' => '650',
            'storage_id' => '4'
        ]);

        DB::table('items')->insert([
            'name' => 'Tesla Model S',
            'stock' => '18',
            'storage_id' => '3'
        ]);

        DB::table('items')->insert([
            'name' => 'Aston Martin DB11',
            'stock' => '2',
            'storage_id' => '3'
        ]);

        DB::table('items')->insert([
            'name' => 'Smart Tv',
            'stock' => '420',
            'storage_id' => '2'
        ]);

        DB::table('items')->insert([
            'name' => 'Smartphone',
            'stock' => '135',
            'storage_id' => '2'
        ]);

        DB::table('items')->insert([
            'name' => 'Cookie',
            'stock' => '998',
            'storage_id' => '1'
        ]);

        DB::table('items')->insert([
            'name' => 'Potato Chips',
            'stock' => '2500',
            'storage_id' => '1'
        ]);

    }
}