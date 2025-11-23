<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('individual.profile');
    }
}
