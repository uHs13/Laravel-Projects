<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use App\Models\Client;
use Tests\TestCase;
use Faker\Factory;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function requestGetRoute(
        string $route,
        $routeData = []
    ): TestResponse {

        return $this->get(route($route, $routeData));
    }

    /**
     * @test
     * @dataProvider dataProviderCallMethod
     * */
    public function shouldCorrectlyCallMethod(
        string $route,
        int $expectedStatus,
        $routeData = []
    ): void {

        $response = $this->requestGetRoute($route, $routeData);

        $response->assertStatus($expectedStatus);
    }

    /**
     * @dataProvider
     * */
    public function dataProviderCallMethod(): array
    {
        return [
            'shouldCorrectlyCallIndex' => [
                'route' => 'clients.index',
                'expectedStatus' => 200
            ],
            'shouldCorrectlyCallCreate' => [
                'route' => 'clients.create',
                'expectedStatus' => 200
            ],
        ];
    }

    public function generateFakeClient(): array
    {
        return [
            'name' => Factory::create()->name,
            'email' => Factory::create()->email,
            'address' => Factory::create()->address
        ];
    }

    public function createClient(array $client): void
    {
        Client::create($client);
    }

    public function getClientId(string $email): int
    {
        return Client::select('id')
        ->where('email', $email)
        ->pluck('id')[0];
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallStore(): void
    {
        $response = $this->post(
            route('clients.store'),
            $this->generateFakeClient()
        );

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldStoreReturnToIndex(): void
    {
        $response = $this->post(
            route('clients.store'),
            $this->generateFakeClient()
        );

        $response->assertRedirect(route('clients.index'));
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallEdit(): void
    {
        $client = $this->generateFakeClient();

        $this->createClient($client);

        $response = $this->requestGetRoute(
            'clients.edit',
            $this->getClientId($client['email'])
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallUpdate(): void
    {
        $client = $this->generateFakeClient();

        $this->createClient($client);

        $response = $this->put(
            route(
                'clients.update',
                $this->getClientId($client['email'])
            ),
            $this->generateFakeClient()
        );

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallDestroy(): void
    {
        $client = $this->generateFakeClient();

        $this->createClient($client);

        $response = $this->delete(
            route(
                'clients.destroy',
                $this->getClientId($client['email'])
            )
        );

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldDestroyReturnToIndex(): void
    {
        $client = $this->generateFakeClient();

        $this->createClient($client);

        $response = $this->delete(
            route(
                'clients.destroy',
                $this->getClientId($client['email'])
            )
        );

        $response->assertRedirect(route('clients.index'));
    }
}