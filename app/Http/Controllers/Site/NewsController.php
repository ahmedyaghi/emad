<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function news()
    {
        $news = News::paginate(9);

        return view('site.news', compact('news'));
    }

    public function news_details($slug)
    {
        $news_details = News::where('slug', $slug)->firstOrFail();

        return view('site.news_details', compact('news_details'));
    }
}
