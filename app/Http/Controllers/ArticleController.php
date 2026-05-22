<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article', compact('article'));
    }
}