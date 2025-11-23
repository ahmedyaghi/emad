<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function exams()
    {
        return view('individual.exams');
    }
}
