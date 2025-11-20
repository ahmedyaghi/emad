<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('individual.dashboard');
    }
}
