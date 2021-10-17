<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListCategoriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_fetch_a_single_category()
    {
      $this->withoutExceptionHandling();

      $category = Category::factory()->create();

      $response = $this->getJson(route('api.v1.categories.show', $category));

      $response->assertExactJson([
        'data' => [
          'type' => 'categories', 
          'id' => (string) $category->getRouteKey(),
          'attributes' => [
            'category_name' => $category->category_name,
          ],
          'links' => [
            'self' => route('api.v1.categories.show', $category),
          ]
        ]
      ]);
    }
}
