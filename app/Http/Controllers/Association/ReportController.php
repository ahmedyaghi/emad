<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function reports()
    {
        return view('association.reports');
    }
}
