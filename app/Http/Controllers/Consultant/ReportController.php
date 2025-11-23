<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function reports()
    {
        return view('consultant.reports');
    }
}
