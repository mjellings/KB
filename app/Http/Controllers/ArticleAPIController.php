<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Article;
 
class ArticleAPIController extends Controller
{
    public function index()
    {
        return Article::all();
    }
 
    public function show($id)
    {
        return Article::with(['user', 'categories', 'tags'])->find($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }

    public function search(Request $request) {
        $query = $request->get('q');
        if ($query) {
            $articles = Article::with(['user', 'categories', 'tags'])->where('title', 'like', "%{$query}%")->orderBy('created_at', 'DESC')->get();
            return response()->json([
                'count' => count($articles),
                'data' => $articles
            ]);
        } else {
            return response()->json([
                'count' => 0
            ]);
        }
        
    }
}