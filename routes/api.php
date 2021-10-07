<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('products/{product}', [ProductController::class, 'show'])
    ->name('api.v1.products.show');

Route::get('products', [ProductController::class, 'index'])
    ->name('api.v1.products.index');

Route::post('products', [ProductController::class, 'create'])   
    ->name('api.v1.products.create');