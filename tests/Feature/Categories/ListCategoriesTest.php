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

    /** @test */
    public function can_fetch_all_categories()
    {
      $this->withoutExceptionHandling();

      $categories = Category::factory(3)->create();

      $response = $this->getJson(route('api.v1.categories.index'));

      $response->assertExactJson([
        'data' => [
          [
            'type' => 'categories',
            'id' => (string) $categories[0]->getRouteKey(),
            'attributes' => [
              'category_name' => $categories[0]->category_name,
            ],
            'links' => [
              'self' => route('api.v1.categories.show', $categories[0]),
            ]
          ],
          [
            'type' => 'categories',
            'id' => (string) $categories[1]->getRouteKey(),
            'attributes' => [
              'category_name' => $categories[1]->category_name,
            ],
            'links' => [
              'self' => route('api.v1.categories.show', $categories[1]),
            ]
          ],
          [
              'type' => 'categories',
              'id' => (string) $categories[2]->getRouteKey(),
              'attributes' => [
                'category_name' => $categories[2]->category_name,
              ],
              'links' => [
                'self' => route('api.v1.categories.show', $categories[2]),
              ]
            ]
          ],
          'links' => [
            'self' => route('api.v1.categories.index')
          ]
      ]);
    }
}
