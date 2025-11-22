<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Association;
use App\Models\City;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityType;

class MainController extends Controller
{
    public function main()
    {
        $associations = Association::all();
        $training_opportunities = TrainingOpportunity::with(['association'])->paginate(9);
        $training_opportunity_types = TrainingOpportunityType::all();
        $associations = Association::all();
        $articles = Article::all();
        $cities = City::all();

        return view('site.main', get_defined_vars());
    }
}
