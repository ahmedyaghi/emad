<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $training_opportunities = TrainingOpportunity::with(['association'])->latest()->take(3)->get();

        return view('individual.dashboard', get_defined_vars());
    }
}
