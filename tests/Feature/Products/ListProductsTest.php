<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListProductsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_fetch_a_single_product()
    {
      $this->withoutExceptionHandling();
      
      $product = Product::factory()->create();

      $response = $this->getJson(route('api.v1.products.show', $product));
    
      $response->assertExactJson([
        'data' => [
          'type' => 'products',
          'id' => (string)$product->getRouteKey(),
          'attributes' => [
            'product_name' => $product->product_name,
            'product_price' => (string) $product->product_price,
            'status' => $product->status,
          ],
          'links' => [
            'self' => route('api.v1.products.show', $product),
          ]
        ]
      ]);
    }

    /** @test */
    public function can_fetch_all_products()
    {

      $this->withoutExceptionHandling();

      $products = Product::factory(3)->create();

      $response = $this->getJson(route('api.v1.products.index'));

      $response->assertExactJson([
        'data' => [
          [
            'type' => 'products', 
            'id' => (string) $products[0]->getRouteKey(),
            'attributes' => [
              'product_name' => $products[0]->product_name,
              'product_price' => (string) $products[0]->product_price,
              'status' => $products[0]->status
            ],
            'links' => [
              'self' => route('api.v1.products.show', $products[0]),
            ]
          ],
          [
            'type' => 'products', 
            'id' => (string) $products[1]->getRouteKey(),
            'attributes' => [
              'product_name' => $products[1]->product_name,
              'product_price' => (string) $products[1]->product_price,
              'status' => $products[1]->status
            ],
            'links' => [
              'self' => route('api.v1.products.show', $products[1]),
            ]
          ],
          [
            'type' => 'products', 
            'id' => (string) $products[2]->getRouteKey(),
            'attributes' => [
              'product_name' => $products[2]->product_name,
              'product_price' => (string) $products[2]->product_price,
              'status' => $products[2]->status
            ],
            'links' => [
              'self' => route('api.v1.products.show', $products[2]),
            ]
            ]
          ],
        'links' => [
          'self' => route('api.v1.products.index')
        ]
      ]);
    }
  }
