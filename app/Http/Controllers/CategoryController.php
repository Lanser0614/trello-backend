<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::query()->paginate(10));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::query()->create($request->validated());

        return response()->json([
            'status' => (bool)$category,
            'message' => $category ? 'Category Created' : 'Error Creating Category'
        ]);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function tasks(Category $category)
    {
        return response()->json($category->tasks()->orderBy('order')->get());
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $status = $category->update($request->validated());

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Category Updated!' : 'Error Updating Category'
        ]);
    }

    public function destroy(Category $category)
    {
        $status = $category->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Category Deleted' : 'Error Deleting Category'
        ]);
    }
}
