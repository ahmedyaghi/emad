<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;

class TrainingOpportunityController extends Controller
{
    public function training_opportunities()
    {
        $training_opportunities = TrainingOpportunity::paginate(9);
        return view('site.training_opportunities', compact('training_opportunities'));
    }

    public function training_opportunity($slug)
    {
        $training_opportunity = TrainingOpportunity::where('slug', $slug)->firstOrFail();
        return view('site.training_opportunity', compact('training_opportunity'));
    }
}
