<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function exams()
    {
        return view('admin.exams.index', get_defined_vars());
    }
}
