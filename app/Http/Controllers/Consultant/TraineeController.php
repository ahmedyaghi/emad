<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;

class TraineeController extends Controller
{
    public function index()
    {
        $trainees = TrainingOpportunity::where('consultant_id', auth()->id())->whereHas('applications')->with(['applications.training', 'applications.user'])->paginate(9);

        return view('consultant.trainees.index', get_defined_vars());
    }
}
