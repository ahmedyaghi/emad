<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;

class AssessmentController extends Controller
{
    public function assessments()
    {
        return view('faculty-member.assessments');
    }
}
