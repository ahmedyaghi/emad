<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function articles()
    {
        return view('association.articles');
    }
}
