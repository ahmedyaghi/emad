<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('faculty-member.dashboard');
    }
}
