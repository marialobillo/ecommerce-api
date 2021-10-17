<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_create_products()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson(route('api.v1.products.create'), [
          'data' => [
            'type' => 'products',
            'attributes' => [
              'product_name' => 'New Product',
              'product_price' => '1990',
              'status' => 1,
            ]
          ]
        ]);

        $response->assertCreated();

        $product = Product::first();

        $response->assertHeader(
          'Location',
          route('api.v1.products.show', $product)
        );

        $response->assertExactJson([
          'data' => [
            'type' => 'products',
            'id' => (string) $product->getRouteKey(),
            'attributes' => [
              'product_name' => 'New Product',
              'product_price' => '1990',
              'status' => 1,
            ],
            'links' => [
              'self' => route('api.v1.products.show', $product)
            ]
          ]
        ]);
    }
}
