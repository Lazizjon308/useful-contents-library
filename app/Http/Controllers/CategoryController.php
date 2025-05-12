<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){}
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
