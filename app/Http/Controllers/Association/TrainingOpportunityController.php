<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;

class TrainingOpportunityController extends Controller
{
    public function training_opportunities()
    {
        $training_opportunities = TrainingOpportunity::with(['association'])->paginate(9);

        return view('association.training_opportunities', compact('training_opportunities'));
    }

    public function training_opportunity($slug)
    {
        $training_opportunity = TrainingOpportunity::with(['association'])->where('slug', $slug)->firstOrFail();

        return view('association.training_opportunity', compact('training_opportunity'));
    }
}
