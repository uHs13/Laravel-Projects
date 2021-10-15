<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Department;
use Tests\TestCase;
use Faker\Factory;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function generateFakeDepartment(): array
    {
        return [
            'name' => Factory::create()->name,
            'description' => Factory::create()->text()
        ];
    }

    public function getSuccessJson(): array
    {
        return [
            'status' => 'success'
        ];
    }

    public function createDepartment(): Department
    {
        $data = $this->generateFakeDepartment();

        $department = new Department();
        $department->name = $data['name'];
        $department->description = $data['description'];
        $department->save();

        return $department;
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallIndex(): void
    {
        $response = $this->get(route('departments.index'));

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallStore(): void
    {
        $response = $this->post(
            route('departments.store'),
            $this->generateFakeDepartment()
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldStoreReturnJson(): void
    {
        $response = $this->post(
            route('departments.store'),
            $this->generateFakeDepartment()
        );

        $response->assertExactJson(
            $this->getSuccessJson()
        );
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallUpdate(): void
    {
        $department = $this->createDepartment();

        $update = $this->generateFakeDepartment();

        $response = $this->put(
            route('departments.update', $department->id),
            [
                'name' => $update['name'],
                'description' => $update['description'],
                'id' => $department->id
            ]
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldUpdateReturnJson(): void
    {
        $department = $this->createDepartment();

        $update = $this->generateFakeDepartment();

        $response = $this->put(
            route('departments.update', $department->id),
            [
                'name' => $update['name'],
                'description' => $update['description'],
                'id' => $department->id
            ]
        );

        $response->assertExactJson(
            $this->getSuccessJson()
        );
    }

    /**
     * @test
     * */
    public function shouldCorrectlyCallDestroy(): void
    {
        $department = $this->createDepartment();

        $response = $this->delete(
            route('departments.destroy', $department->id),
            ['id' => $department->id]
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * */
    public function shouldDestroyReturnJson(): void
    {
        $department = $this->createDepartment();

        $response = $this->delete(
            route('departments.destroy', $department->id),
            ['id' => $department->id]
        );

        $response->assertExactJson(
            $this->getSuccessJson()
        );
    }
}