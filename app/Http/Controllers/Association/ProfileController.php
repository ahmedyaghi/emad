<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('association.profile');
    }
}
