<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Http\Controllers\Address;
use Tests\TestCase;

class AddressTest extends TestCase
{
    /**
     * @test
     * */
    public function shouldCorrectlyCallIndex(): void
    {
        $response = $this->get(route('addresses.index'));

        $response->assertStatus(200);
    }
}