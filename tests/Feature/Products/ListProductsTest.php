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

      $response = $this->getJson('/api/v1/products/'. $product->getRouteKey());
    
      $response->assertJson([
        'data' => [
          'type' => 'products',
          'id' => (string)$product->getRouteKey(),
          'attributes' => [
            'product_name' => $product->product_name,
            'product_price' => $product->product_price,
            'status' => $product->status,
          ],
          'links' => [
            'self' => url('/api/v1/products'. $product->getRouteKey()),
          ]
        ]
      ]);
    }
}
