<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('consultant.dashboard');
    }
}
