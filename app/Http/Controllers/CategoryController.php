<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();

        Category::create($data);

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('pages.category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
