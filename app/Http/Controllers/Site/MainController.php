<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Association;
use App\Models\TrainingOpportunity;

class MainController extends Controller
{
    public function main()
    {
        $associations = Association::all();
        $training_opportunities = TrainingOpportunity::all();
        $articles = Article::all();

        return view('site.main', get_defined_vars());
    }
}
