<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCategoryAvailable()
    {
        $response = $this->get('/news/categories');

        $response->assertStatus(200);
    }

    public function testCategoryAdminAvailable()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function testCategoryCreatedAdminAvailable()
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }

    public function testCategoryAdminCreated()
    {
        $responseData = Category::factory()->definition();
        $response = $this->post(route('admin.categories.store'), $responseData);

        // $response->assertJson($responseData);
        $response->assertStatus(302);
    }
}
