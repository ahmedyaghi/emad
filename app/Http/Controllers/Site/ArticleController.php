<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function articles()
    {
        $articles = Article::paginate(9);
        return view('site.articles', compact('articles'));
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('site.article', compact('article'));
    }
}
