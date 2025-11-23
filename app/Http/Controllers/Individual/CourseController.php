<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function courses()
    {
        return view('individual.courses');
    }
}
