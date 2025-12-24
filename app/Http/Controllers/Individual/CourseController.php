<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function courses()
    {
        $courses = Auth::user()->courses()->with(['exams', 'exams.examAnswers'])->paginate(9);

        return view('individual.courses', get_defined_vars());
    }

    public function course_details($slug)
    {
        $course = Auth::user()->courses()
            ->where('slug', $slug)
            ->with(['exams' => function ($query) {
                $query->with('examAnswers');
            }])
            ->firstOrFail();

        return view('individual.course_details', get_defined_vars());
    }
}
