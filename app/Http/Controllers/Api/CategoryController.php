<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    

    public function show(Category $category): CategoryResource{

        return CategoryResource::make($category);
    }
}
