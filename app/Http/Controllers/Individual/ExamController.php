<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function exams()
    {
        $courses = Auth::user()->courses()->exams()->paginate(9);

        return view('individual.exams', get_defined_vars());
    }
}
