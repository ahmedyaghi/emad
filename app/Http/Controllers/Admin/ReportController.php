<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function reports()
    {
        return view('admin.reports.index', get_defined_vars());
    }
}
