<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function courses()
    {
        Auth::user()->courses()->attach([
            'course_id' => 1,
        ]);
        $courses = Auth::user()->courses()->paginate(9);

        return view('individual.courses', get_defined_vars());
    }

    public function course_details($slug)
    {
        $course = $courses = Auth::user()->courses()->where('slug', $slug)->firstOrFail();

        return view('individual.course_details', get_defined_vars());
    }
}
