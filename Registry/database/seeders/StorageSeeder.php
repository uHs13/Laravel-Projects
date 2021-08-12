<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->insert(['name' => 'Food']);
        DB::table('storages')->insert(['name' => 'Eletronics']);
        DB::table('storages')->insert(['name' => 'Vehicles']);
        DB::table('storages')->insert(['name' => 'Construction']);
        DB::table('storages')->insert(['name' => 'Clothes']);
    }
}