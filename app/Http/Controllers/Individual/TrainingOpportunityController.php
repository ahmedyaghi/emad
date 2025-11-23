<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;

class TrainingOpportunityController extends Controller
{
    public function training_opportunities()
    {
        $training_opportunities = TrainingOpportunity::with(['association'])->paginate(9);

        return view('individual.training_opportunities', compact('training_opportunities'));
    }

    public function my_training_opportunities()
    {
        return view('individual.my_training_opportunities');
    }

    public function training_opportunity($slug)
    {
        $training_opportunity = TrainingOpportunity::with(['association'])->where('slug', $slug)->firstOrFail();

        return view('individual.training_opportunity', compact('training_opportunity'));
    }
}
