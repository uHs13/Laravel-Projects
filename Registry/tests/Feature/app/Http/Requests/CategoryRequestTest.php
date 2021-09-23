<?php

namespace Tests\Feature\app\Http\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Tests\TestCase;

class CategoryRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldNotBeValidIfNameIsNotUnique(): void
    {
        Category::create(['name' => 'Eletronics']);

        $this->shouldBeValid(
            ['name' => 'Eletronics'],
            false
        );
    }

    public function isRequestValid(array $data): bool
    {
        $request = new CategoryRequest();

        $validator = Validator::make(
            $data,
            $request->rules()
        );

        return $validator->passes();
    }

    /**
     * @test
     * @dataProvider dataProvider
    */
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
            'shouldNotBeValidIfLengthIsLowerThan3' => [
                'value' => [
                    'name' => Str::random(2)
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfLengthIsGreaterThan50' => [
                'value' => [
                    'name' => Str::random(51)
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfIsEmpty' => [
                'value' => [
                    'name' => ''
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfRequestIsEmpty' => [
                'value' => [],
                'expected' => false
            ],
            'shouldBeValidIfRequestDataIsOk' => [
                'value' => [
                    'name' => 'Category'
                ],
                'expected' => true
            ],
        ];
    }
}