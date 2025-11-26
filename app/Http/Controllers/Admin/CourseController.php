<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function courses()
    {
        return view('admin.courses.index', get_defined_vars());
    }
}
