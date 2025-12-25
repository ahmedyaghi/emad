<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user()->load('profile');

        return view('consultant.profile', get_defined_vars());
    }
}
