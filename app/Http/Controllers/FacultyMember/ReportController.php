<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function reports()
    {
        return view('faculty-member.reports');
    }
}
