<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function reports()
    {
        return view('individual.reports');
    }
}
