<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;

class TraineeController extends Controller
{
    public function trainees()
    {
        return view('faculty-member.trainees');
    }
}
