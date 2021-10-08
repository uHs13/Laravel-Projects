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

    private CategoryRequest $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = new CategoryRequest();
    }

    public function getRequest(): CategoryRequest
    {
        return $this->request;
    }

    /**
     * @test
     * */
    public function shouldAuthorize(): void
    {
        $this->assertTrue(
            $this->getRequest()->authorize()
        );
    }

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
        $validator = Validator::make(
            $data,
            $this->getRequest()->rules()
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

    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->request);
    }
}