<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function courses()
    {
        $courses = Course::paginate();

        return view('admin.courses.index', get_defined_vars());
    }

    public function course_details($slug)
    {
        $course = Course::with(['lecturers'])->where('slug', $slug)->firstOrFail();

        return view('admin.courses.course_details', get_defined_vars());
    }
}
