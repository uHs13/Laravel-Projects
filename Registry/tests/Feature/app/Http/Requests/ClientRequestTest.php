<?php

namespace Tests\Feature\app\Http\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Tests\TestCase;
use Faker\Factory;

class ClientRequestTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = new ClientRequest();
    }

    public function getRequest(): ClientRequest
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
     * */
    public function shouldNotBeValidIfEmailIsNotUnique(): void
    {
        $data = [
            'name' => Factory::create()->name,
            'email' => 'email@email.com',
            'address' => Factory::create()->address,
        ];

        Client::create($data);

        $this->shouldBeValid(
            $data,
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
            'shouldNotBeValidIfRequestIsEmpty' => [
                'value' => [],
                'expected' => false
            ],
            'shouldNotBeValidIfNameIsEmpty' => [
                'value' => [
                    'name' => '',
                    'email' => Factory::create()->email,
                    'address' => Factory::create()->address
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfEmailIsEmpty' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => '',
                    'address' => Factory::create()->address
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfAddressIsEmpty' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => Factory::create()->email,
                    'address' => ''
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfNameNotExists' => [
                'value' => [
                    'email' => Factory::create()->email,
                    'address' => Factory::create()->address
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfEmailNotExists' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'address' => Factory::create()->address
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfAddressNotExists' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => Factory::create()->email
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfNameLengthIsLowerThan3' => [
                'value' => [
                    'name' => Str::random(2),
                    'email' => Factory::create()->email,
                    'address' => Factory::create()->address,
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfNameLengthIsGreaterThan50' => [
                'value' => [
                    'name' => Str::random(51),
                    'email' => Factory::create()->email,
                    'address' => Factory::create()->address,
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfEmailIsInvalid' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => Factory::create()->name,
                    'address' => Factory::create()->address,
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfEmailLengthIsGreaterThan100' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => Str::random(100) . '@email.com',
                    'address' => Factory::create()->address,
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfAddressLengthIsLowerThan5' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => Factory::create()->email,
                    'address' => Str::random(4),
                ],
                'expected' => false
            ],
            'shouldNotBeValidIfAddressLengthIsGreaterThan100' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => Factory::create()->email,
                    'address' => Str::random(101),
                ],
                'expected' => false
            ],
            'shouldBeValidIfRequestDataIsOk' => [
                'value' => [
                    'name' => Factory::create()->name,
                    'email' => Factory::create()->email,
                    'address' => Factory::create()->address,
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