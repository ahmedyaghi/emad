<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('consultant.profile');
    }
}
