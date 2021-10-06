<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    

    public function show(Product $product){

        return response()->json([
            'data' => [
              'type' => 'products',
              'id' => $product->getRouteKey(),
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
