<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::paginate(9);

        return view('admin.reports.index', get_defined_vars());
    }

    public function show(Report $report)
    {
        return view('admin.reports.show', get_defined_vars());
    }
}
