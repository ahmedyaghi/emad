<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class AssessmentController extends Controller
{
    public function assessments()
    {
        return view('consultant.assessments');
    }
}
