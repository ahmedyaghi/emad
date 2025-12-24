<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Assessment;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::whereHas('application.user', function ($q) {
            $q->where('user_id', auth()->id());
        })->paginate(9);

        return view('individual.assessments.index', get_defined_vars());
    }

    public function show($id)
    {
        $assessment = Assessment::with(['application', 'criterias.evaluation', 'criterias.criteria'])->findOrFail($id);

        return view('individual.assessments.show', get_defined_vars());
    }
}
