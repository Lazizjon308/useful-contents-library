<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('profile.categories.index', compact('categories'));
    }
    public function create(){
        return view('profile.categories.create');
    }
    public function store(Request $request)
    {
        Category::create($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category){
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category){
        $category->update($request->validated());
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
