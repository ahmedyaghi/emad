<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $training_opportunities = TrainingOpportunity::where('association_id', auth()->id())->take(6)->get();

        return view('association.dashboard', get_defined_vars());
    }
}
