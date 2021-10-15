<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;

class ItemTest extends TestCase
{
     /**
     *@test
     */
    public function shouldCorrectlyCallIndex()
    {
        $response = $this->get(route('items.index'));

        $response->assertStatus(200);
    }
}
