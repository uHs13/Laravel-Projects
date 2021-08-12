<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DevelopersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('developers')->insert([
            'name' => 'Developer1'
        ]);

        DB::table('developers')->insert([
            'name' => 'Developer2'
        ]);

        DB::table('developers')->insert([
            'name' => 'Developer3'
        ]);

    }
}