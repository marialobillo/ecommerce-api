<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SliderController;

Route::get('products/{product}', [ProductController::class, 'show'])
    ->name('api.v1.products.show');

Route::get('products', [ProductController::class, 'index'])
    ->name('api.v1.products.index');

Route::post('products', [ProductController::class, 'create'])   
    ->name('api.v1.products.create');


Route::get('categories/{category}', [CategoryController::class, 'show'])    
    ->name('api.v1.categories.show');

Route::get('categories', [CategoryController::class, 'index'])
    ->name('api.v1.categories.index');

Route::post('categories', [CategoryController::class, 'create'])
    ->name('api.v1.categories.create');


Route::get('sliders/{slider}', [SliderController::class, 'show'])
    ->name('api.v1.sliders.show');