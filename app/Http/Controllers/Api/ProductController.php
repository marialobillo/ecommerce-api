<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{

    public function index(): ProductCollection {

      $products = Product::all();
      return ProductCollection::make($products);
    }
    

    public function show(Product $product): ProductResource{

        return ProductResource::make($product);
    }
}
