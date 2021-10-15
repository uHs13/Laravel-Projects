<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     *@test
     */
    public function shouldCorrectlyCallIndex()
    {
        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
    }
}