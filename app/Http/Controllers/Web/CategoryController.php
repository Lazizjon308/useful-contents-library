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
    public function create(){}
    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show(Category $category){}

    public function edit(Category $category){}

    public function update(UpdateCategoryRequest $request, Category $category){}

    public function destroy(Category $category){}
}
