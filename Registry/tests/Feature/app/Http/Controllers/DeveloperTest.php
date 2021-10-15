<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;

class DeveloperTest extends TestCase
{
    /**
     *@test
     */
    public function shouldCorrectlyCallIndex()
    {
        $response = $this->get(route('developers.index'));

        $response->assertStatus(200);
    }
}
