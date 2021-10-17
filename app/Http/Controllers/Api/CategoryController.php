<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    public function index(): CategoryCollection
    {
        $categories = Category::all();
        return CategoryCollection::make($categories);
    }

    public function show(Category $category): CategoryResource{

        return CategoryResource::make($category);
    }

    public function create(Request $request)
    {
        $category = Category::create([
            'category_name' => $request->input('data.attributes.category_name'),
        ]);

        return CategoryResource::make($category);
    }
}
