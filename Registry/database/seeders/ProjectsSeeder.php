<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('projects')->insert([
            'name' => 'Project1'
        ]);

        DB::table('projects')->insert([
            'name' => 'Project2'
        ]);

        DB::table('projects')->insert([
            'name' => 'Project3'
        ]);

        DB::table('projects')->insert([
            'name' => 'Project4'
        ]);

    }
}