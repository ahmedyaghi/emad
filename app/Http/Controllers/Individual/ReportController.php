<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::whereHas('application.user', function ($q) {
            $q->where('user_id', auth()->id());
        })->paginate(9);

        return view('individual.reports.index', get_defined_vars());
    }

    public function show(Report $report)
    {
        return view('individual.reports.show', get_defined_vars());
    }
}
