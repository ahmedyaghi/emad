<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    public function reports()
    {   
        $reports = Report::whereHas('application.user', function ($q) {
            $q->where('user_id', auth()->id());
        })->paginate(9);
        
        return view('individual.reports', get_defined_vars());
    }
}
