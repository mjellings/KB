<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;
use App\Http\Requests\UpdateArticle;
use App\Article;
use App\Category;
use App\Tag;

class ArticleController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        $data = array();

        $articles = Article::orderBy('created_at', 'DESC')->get();
        $data['articles'] = $articles;

        $categories = Category::all();
        $data['categories'] = $categories;

        $tags = Tag::all();
        $data['tags'] = $tags;

        return view('articles.index', $data);
    }

    public function show($article) {
        $data = array();
        $data['article'] = Article::findOrFail($article);
        return view('articles.show', $data);
    }

    public function create() {
        $data = array();

        $categories = Category::all();
        $data['categories'] = $categories;

        $tags = Tag::all();
        $data['tags'] = $tags;

        return view('articles.create', $data);
    }

    public function store(StoreArticle $request) {

        $validated = $request->validated();

        $article = new Article;

        $article->title = $validated['title'];
        $article->body = $validated['body'];
        $article->user_id = \Auth::user()->id;
        $article->created_at = Now();
        $article->updated_at = Now();
        $article->save();

        $article->categories()->attach(array($validated['category']));
        $article->tags()->attach($validated['tags']);
        $article->save();

        return redirect('articles');
    }

    public function edit($id) {
        $data = array();
        $data['article'] = Article::findOrFail($id);

        $categories = Category::all();
        $data['categories'] = $categories;

        $tags = Tag::all();
        $data['tags'] = $tags;

        return view('articles.edit', $data);
    }

    public function update(UpdateArticle $request, $id) {
        $article = Article::findOrFail($id);

        $validated = $request->validated();

        $article->title = $validated['title'];
        $article->body = $validated['body'];
        $article->updated_at = Now();
        $article->categories()->sync($validated['category']);
        $article->tags()->sync($validated['tags']);
        $article->save();

        return redirect('articles')->with('success', 'Article updated');
    }
}