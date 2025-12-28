<?php

namespace App\Http\Controllers\FacultyMember;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Note;
use App\Models\Report;
use App\Models\TrainingOpportunity;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $trainees_count = TrainingOpportunity::where('faculty_member_id', auth()->id())->whereHas('applications', function ($query) {
            $query->where('status', TrainingApplicationStatus::ACCEPTED);
        })->count();
        $reports_count = Report::where('faculty_member_id', auth()->id())->count();
        $assessments_count = Assessment::where('faculty_member_id', auth()->id())->count();
        $notes_count = Note::where('send_from', auth()->id())->count();
        $trainees = TrainingOpportunity::where('faculty_member_id', auth()->id())->whereHas('applications', function ($query) {
            $query->where('status', TrainingApplicationStatus::ACCEPTED);
        })->take(3)->get();
        $reports = Report::with('application')->where('faculty_member_id', auth()->id())->take(3)->get();
        $assessments = Assessment::with('application')->where('faculty_member_id', auth()->id())->take(3)->get();

        return view('faculty-member.dashboard', get_defined_vars());
    }
}
