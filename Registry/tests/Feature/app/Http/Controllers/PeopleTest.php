<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;

class PeopleTest extends TestCase
{
    /**
     *@test
     */
    public function shouldCorrectlyCallIndex()
    {
        $response = $this->get(route('people.index'));

        $response->assertStatus(200);
    }
}