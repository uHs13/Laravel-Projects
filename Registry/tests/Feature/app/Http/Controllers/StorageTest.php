<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorageTest extends TestCase
{
    /**
     *@test
     */
    public function shouldCorrectlyCallIndex()
    {
        $response = $this->get(route('storages.index'));

        $response->assertStatus(200);
    }
}