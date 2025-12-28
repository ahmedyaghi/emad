<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user()->load('profile');

        return view('faculty-member.profile', get_defined_vars());
    }
}
