<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client as Model;

class Client extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::factory(1000)->create();
    }
}