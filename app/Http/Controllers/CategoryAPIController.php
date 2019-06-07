<?php

namespace App\Http\Controllers;

use App\Category;
 
class CategoryAPIController extends Controller
{
    public function index()
    {
        return Category::all();
    }
 
    public function show($id)
    {
        return Category::with(['articles'])->find($id);
    }

    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $category;
    }

    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return 204;
    }
}