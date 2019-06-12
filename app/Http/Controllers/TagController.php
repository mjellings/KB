<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\StoreTag;
use App\Tag;

class TagController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $data = array();

        $tags = Tag::orderBy('title')->get();
        $data['tags'] = $tags;

        return view('tags.index', $data);
    }

    public function store(StoreTag $request) {

        $validated = $request->validated();

        $tag = new Tag;

        $tag->slug = $validated['slug'];
        $tag->title = $validated['title'];
        $tag->created_at = Now();
        $tag->updated_at = Now();
        $tag->save();

        return redirect('tags');
    }
}