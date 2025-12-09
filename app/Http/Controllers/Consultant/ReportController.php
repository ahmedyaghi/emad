<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        return view('consultant.reports.index');
    }
}
