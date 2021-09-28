<?php

namespace Tests\Feature\app\Http\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;
use Faker\Factory;

class ProductRequestTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function getRandomStock(): int
    {
        return rand(0, 1000);
    }

    public function getRandomPrice(): float
    {
        return rand(0, 1000) / 10;
    }

    public function getRandomCategory(): int
    {
        return rand(0, 5);
    }

    /**
     * @test
     * */
    public function shouldBeValidIfRequestDataIsOk(): void
    {
        Category::create([
            'name' => 'Category'
        ]);

        $this->shouldBeValid([
            'name' => Factory::create()->name,
            'stock' => $this->getRandomStock(),
            'price' => $this->getRandomPrice(),
            'category' => Category::select('id')
            ->where('name', 'Category')
            ->pluck('id')[0],
        ], true);
    }

    /**
     * @test
     * */
    public function shouldNotBeValidIfNameIsNotUnique(): void
    {

        Department::create([
            'name' => 'Department',
            'description' => 'Some text'
        ]);

        Category::create([
            'name' => 'Category'
        ]);

        Product::create([
            'name' => 'Product',
            'stock' => $this->getRandomStock(),
            'price' => $this->getRandomPrice(),
            'category_id' => Category::select('id')
            ->where('name', 'Category')
            ->pluck('id')[0],
            'department_id' => Department::select('id')
            ->where('name', 'Department')
            ->pluck('id')[0]
        ]);

        $this->shouldBeValid([
            'name' => 'Product',
            'stock' => $this->getRandomStock(),
            'price' => $this->getRandomPrice(),
            'category' => $this->getRandomCategory(),
        ], false);
    }

    public function isRequestValid(array $value): bool
    {
        $request = new ProductRequest();

        $validator = Validator::make(
            $value,
            $request->rules()
        );

        return $validator->passes();
    }

    /**
     * @test
     * @dataProvider dataProvider
     * */
    public function shouldBeValid(
        array $value,
        bool $expected
    ): void {

        $this->assertEquals(
            $expected,
            $this->isRequestValid($value)
        );
    }

    public function dataProvider(): array
    {
        return [
            'shouldNotBeValidIfNameIsEmpty' => [
                'value' => [
                    'name' => '',
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomPrice(),
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfStockIsEmpty' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => '',
                    'price' => $this->getRandomPrice(),
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfPriceIsEmpty' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'price' => '',
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfCategoryIsEmpty' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomPrice(),
                    'category' => ''
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfNameNotExists' => [
                'value' => [
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomPrice(),
                    'category' => ''
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfStockNotExists' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'price' => $this->getRandomPrice(),
                    'category' => ''
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfPriceNotExists' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'category' => ''
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfCategoryNotExists' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomPrice()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfNameLengthIsLowerThan3' => [
                'value' => [
                    'name' => Str::random(2),
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomPrice(),
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfNameLengthIsGreaterThan50' => [
                'value' => [
                    'name' => Str::random(51),
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomPrice(),
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfStockIsLowerThan1' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => 0,
                    'price' => $this->getRandomPrice(),
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfStockIsGreaterThan9999' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => 99999,
                    'price' => $this->getRandomPrice(),
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfPriceIsNotNumeric' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'price' => 'price',
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfPriceIsNotBetween0And999999999' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'price' => -1,
                    'category' => $this->getRandomCategory()
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfCategoryIsNotNumeric' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomStock(),
                    'category' => 'category'
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfCategoryIdNotExists' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'stock' => $this->getRandomStock(),
                    'price' => $this->getRandomStock(),
                    'category' => 100
                ],
                'expected' => false
            ],
        ];
    }
}