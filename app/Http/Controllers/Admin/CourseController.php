<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Qualification;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate();

        return view('admin.courses.index', get_defined_vars());
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', get_defined_vars());
    }

    public function create()
    {
        $qualifications = Qualification::all();

        return view('admin.courses.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
