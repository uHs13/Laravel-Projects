<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RelashionshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('relashionships')->insert([
            'developer_id' => 1,
            'project_id' => 4
        ]);

        DB::table('relashionships')->insert([
            'developer_id' => 2,
            'project_id' => 3
        ]);

        DB::table('relashionships')->insert([
            'developer_id' => 3,
            'project_id' => 2
        ]);

        DB::table('relashionships')->insert([
            'developer_id' => 3,
            'project_id' => 1
        ]);

        DB::table('relashionships')->insert([
            'developer_id' => 2,
            'project_id' => 1
        ]);

        DB::table('relashionships')->insert([
            'developer_id' => 1,
            'project_id' => 1
        ]);

    }
}