<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Note;
use App\Models\Report;
use App\Models\TrainingOpportunity;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $trainees_count = TrainingOpportunity::where('consultant_id', auth()->id())->whereHas('applications')->count();
        $reports_count = Report::where('consultant_id', auth()->id())->count();
        $assessments_count = Assessment::where('consultant_id', auth()->id())->count();
        $notes_count = Note::where('send_from', auth()->id())->count();

        $trainees = TrainingOpportunity::where('consultant_id', auth()->id())->whereHas('applications')->take(3)->get();
        $reports = Report::where('consultant_id', auth()->id())->take(3)->get();
        $assessments = Assessment::where('consultant_id', auth()->id())->take(3)->get();

        return view('consultant.dashboard', get_defined_vars());
    }
}
