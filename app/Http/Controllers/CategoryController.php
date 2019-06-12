<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\StoreCategory;
use App\Category;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $data = array();

        $categories = Category::orderBy('title')->get();
        $data['categories'] = $categories;

        return view('categories.index', $data);
    }

    public function store(StoreCategory $request) {

        $validated = $request->validated();

        $category = new Category;

        $category->slug = $validated['slug'];
        $category->title = $validated['title'];
        $category->created_at = Now();
        $category->updated_at = Now();
        $category->save();

        return redirect('categories');
    }
}