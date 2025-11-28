<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('faculty-member.profile');
    }
}
