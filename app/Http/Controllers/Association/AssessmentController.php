<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;

class AssessmentController extends Controller
{
    public function index()
    {
        return view('association.assessments.index');
    }
}
