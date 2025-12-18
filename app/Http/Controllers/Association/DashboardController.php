<?php

namespace App\Http\Controllers\Association;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityApplication;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $training_opportunities = TrainingOpportunity::withCount('applications')->where('association_id', auth()->id())->take(6)->get();
        $trainees_count = TrainingOpportunityApplication::where('status', TrainingApplicationStatus::ACCEPTED)
            ->whereHas('training', function ($q) {
                $q->where('association_id', auth()->id());
            })->count();

        $applications_count = TrainingOpportunityApplication::whereHas('training', function ($q) {
            $q->where('association_id', auth()->id());
        })->count();

        return view('association.dashboard', get_defined_vars());
    }
}
