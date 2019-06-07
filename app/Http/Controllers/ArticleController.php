<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Article;

class ArticleController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index() {

        $articles = Article::all();

        $data['articles'] = $articles;
        return view('articles.index', $data);
    }

    function show($article) {
        $data['article'] = Article::findOrFail($article);
        return view('articles.show', $data);
    }

    function create() {
        return view('articles.create');
    }
}