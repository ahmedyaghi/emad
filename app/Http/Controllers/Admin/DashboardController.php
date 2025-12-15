<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\TrainingOpportunityApplication;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users_count = User::count();
        $trainees_count = User::where('type', UserType::INDIVIDUAL)->count();
        $associations_count = User::where('type', UserType::ASSOCIATION)->count();
        $students = TrainingOpportunityApplication::with(['user', 'training'])->take(3)->get();
        $notes_count = Note::count();

        return view('admin.dashboard', get_defined_vars());
    }
}
