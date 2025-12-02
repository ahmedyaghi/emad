<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        $association = auth()->user();

        return view('association.profile', get_defined_vars());
    }
}
