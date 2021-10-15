<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
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

    public function generateFakeCategory(): array
    {
        return [
            'name' => Factory::create()->name
        ];
    }

    public function generateRandomName(): string
    {
        return Factory::create()->name;
    }

    public function createCategory(string $name): void
    {
        Category::create(['name' => $name]);
    }

    public function getCategoryId(string $name): int
    {
        return Category::select('id')
        ->where('name', $name)
        ->pluck('id')[0];
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
        $response = $this->post(
            route('categories.store'),
            $this->generateFakeCategory()
        );

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldStoreReturnToIndex(): void
    {
        $response = $this->post(
            route('categories.store'),
            $this->generateFakeCategory()
        );

        $response->assertRedirect(route('categories.index'));
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallEdit(): void
    {
        $name = $this->generateRandomName();

        $this->createCategory($name);

        $response = $this->requestGetRoute(
            'categories.edit',
            $this->getCategoryId($name)
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallUpdate(): void
    {
        $name = $this->generateRandomName();

        $this->createCategory($name);

        $response = $this->put(route(
            'categories.update',
            $this->getCategoryId($name)
        ), ['name' => 'OtherName']);

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldUpdateReturnToIndex(): void
    {
        $name = $this->generateRandomName();

        $this->createCategory($name);

        $response = $this->put(route(
            'categories.update',
            $this->getCategoryId($name)
        ), ['name' => 'OtherName']);

        $response->assertRedirect(route('categories.index'));
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallDestroy(): void
    {
        $name = $this->generateRandomName();

        $this->createCategory($name);

        $response = $this->delete(route(
            'categories.destroy',
            $this->getCategoryId($name)
        ));

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldDestroyReturnToIndex(): void
    {
        $name = $this->generateRandomName();

        $this->createCategory($name);

        $response = $this->delete(route(
            'categories.destroy',
            $this->getCategoryId($name)
        ));

        $response->assertRedirect(route('categories.index'));
    }
}