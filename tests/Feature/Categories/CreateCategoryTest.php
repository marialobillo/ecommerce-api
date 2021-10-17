<?php

namespace Tests\Feature\Categories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @ test
     */
    // public function can_create_category()
    // {
    //   $this->withoutExceptionHandling();

    //   $response = $this->postJson(route('api.v1.categories.create'), [
    //     'data' => [
    //       'type' => 'categories', 
    //       'attributes' => [
    //         'category_name' => 'New Category',
    //       ]
    //     ]
    //   ]);

    //   $response->assertCreated();

    //   $category = Category::first();

    //   $response->assertHeader(
    //     'Location',
    //     route('api.v1.categories.show', $category)
    //   );

    //   $response->assertExactJson([
    //     'data' => [
    //       'type' => 'categories', 
    //       'id' => (string) $category->getRouteKey(),
    //       'attributes' => [
    //         'category_name' => 'New Category'
    //       ],
    //       'links' => [
    //         'self' => route('api.v1.categories.show', $category)
    //       ]
    //     ]
    //   ]);
    // }
}
