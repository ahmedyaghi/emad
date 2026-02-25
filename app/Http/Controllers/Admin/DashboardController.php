<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Note;
use App\Models\Report;
use App\Models\TrainingOpportunityApplication;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users_count = User::count();
        $trainees_count = User::where('type', UserType::INDIVIDUAL)->whereHas('training_opportunity_applications')->count();
        $associations_count = User::where('type', UserType::ASSOCIATION)->count();
        $trainees = TrainingOpportunityApplication::with(['user', 'user.profile', 'training'])->take(3)->get();
        $notes_count = Note::count();
        $reports = Report::with(['application.user'])->take(3)->get();
        $assessments = Assessment::all();

        return view('admin.dashboard', get_defined_vars());
    }
}
