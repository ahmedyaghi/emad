<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        return view('association.reports.index');
    }
}
