<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;
use Faker\Factory;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function getCategoryId(): int
    {
        $category = new Category();
        $category->name = Factory::create()->name;
        $category->save();

        return $category->id;
    }

    public function getDepartmentId(): int
    {
        $department = new Department();
        $department->name = Factory::create()->name;
        $department->description = Factory::create()->text();
        $department->save();

        return $department->id;
    }

    public function requestGetRoute(
        string $route,
        $routeData = []
    ): TestResponse {

        return $this->get(route($route, $routeData));
    }

    public function generateRandomProduct(): array
    {
        return [
            'name' => Factory::create()->name,
            'stock' => mt_rand(10, 100),
            'price' => rand(1, 1000),
            'category_id' => $this->getCategoryId(),
            'department_id' => $this->getDepartmentId()
        ];
    }

    public function generateFakeProduct(): array
    {
        return [
            'name' => Factory::create()->name,
            'stock' => mt_rand(10, 100),
            'price' => rand(1, 1000),
            'category' => $this->getCategoryId(),
            'department' => $this->getDepartmentId()
        ];
    }

    public function createProduct(array $data): void
    {
        Product::create($data);
    }

    public function getProductId(string $name): int
    {
        return Product::select('id')
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
                'route' => 'products.index',
                'expectedStatus' => 200
            ],
            'shouldCorrectlyCallCreate' => [
                'route' => 'products.create',
                'expectedStatus' => 200
            ]
        ];
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallStore(): void
    {
        $response = $this->post(
            route('products.store'),
            $this->generateRandomProduct()
        );

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldStoreReturnToIndex(): void
    {
        $response = $this->post(
            route('products.store'),
            $this->generateFakeProduct()
        );

        $response->assertRedirect(route('products.index'));
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallEdit(): void
    {
        $product = $this->generateRandomProduct();

        $this->createProduct($product);

        $response = $this->requestGetRoute(
            'products.edit',
            $this->getProductId($product['name'])
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallUpdate(): void
    {
        $product = $this->generateRandomProduct();

        $this->createProduct($product);

        $response = $this->put(route(
            'products.update',
            $this->getProductId($product['name'])
        ), $this->generateFakeProduct());

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldUpdateReturnToIndex(): void
    {
        $product = $this->generateRandomProduct();

        $this->createProduct($product);

        $response = $this->put(route(
            'products.update',
            $this->getProductId($product['name'])
        ), $this->generateFakeProduct());

        $response->assertRedirect(route('products.index'));
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallDestroy(): void
    {
        $product = $this->generateRandomProduct();

        $this->createProduct($product);

        $response = $this->delete(route(
            'products.destroy',
            $this->getCategoryId($product['name'])
        ));

        $response->assertStatus(302);
    }

    /**
     * @test
     * */
    public function shouldDestroyReturnToIndex(): void
    {
        $product = $this->generateRandomProduct();

        $this->createProduct($product);

        $response = $this->delete(route(
            'products.destroy',
            $this->getCategoryId($product['name'])
        ));

        $response->assertRedirect(route('products.index'));
    }
}