<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use App\Http\Requests\ClientRequest;
use App\Models\Category;
use Tests\TestCase;
use Faker\Factory;

class CategoryTest extends TestCase
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
                'route' => 'categories.index',
                'expectedStatus' => 200
            ],
            'shouldCorrectlyCallCreate' => [
                'route' => 'categories.create',
                'expectedStatus' => 200
            ],
        ];
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallStore(): void
    {
        $response = $this->post(route('categories.store'), [
            'name' => Factory::create()->name
        ]);

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldStoreReturnToIndex(): void
    {
        $response = $this->post(route('categories.store'), [
            'name' => Factory::create()->name
        ]);

        $response->assertRedirect(route('categories.index'));
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallEdit(): void
    {
        $name = Factory::create()->name;

        Category::create(['name' => $name]);

        $response = $this->requestGetRoute(
            'categories.edit',
            Category::select('id')
            ->where('name', $name)
            ->pluck('id')[0]
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallUpdate(): void
    {
        $name = Factory::create()->name;

        Category::create(['name' => $name]);

        $response = $this->put(route(
            'categories.update',
            Category::select('id')
            ->where('name', $name)
            ->pluck('id')[0]
        ), ['name' => 'OtherName']);

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldUpdateReturnToIndex(): void
    {
        $name = Factory::create()->name;

        Category::create(['name' => $name]);

        $response = $this->put(route(
            'categories.update',
            Category::select('id')
            ->where('name', $name)
            ->pluck('id')[0]
        ), ['name' => 'OtherName']);

        $response->assertRedirect(route('categories.index'));
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallDestroy(): void
    {
        $name = Factory::create()->name;

        Category::create(['name' => $name]);

        $response = $this->delete(route(
            'categories.update',
            Category::select('id')
            ->where('name', $name)
            ->pluck('id')[0]
        ), ['name' => 'OtherName']);

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldDestroyReturnToIndex(): void
    {
        $name = Factory::create()->name;

        Category::create(['name' => $name]);

        $response = $this->put(route(
            'categories.destroy',
            Category::select('id')
            ->where('name', $name)
            ->pluck('id')[0]
        ), ['name' => 'OtherName']);

        $response->assertRedirect(route('categories.index'));
    }
}