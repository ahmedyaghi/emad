<?php

namespace App\Http\Controllers\Association;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Association\ReportRequest;
use App\Models\Report;
use App\Models\TrainingOpportunityApplication;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('application')->where('association_id', auth()->id())->paginate(9);

        return view('association.reports.index', get_defined_vars());
    }

    public function create()
    {
        $applications = TrainingOpportunityApplication::with(['user', 'training'])->where('status', TrainingApplicationStatus::ACCEPTED)
            ->whereHas('training', function ($q) {
                $q->where('association_id', auth()->id());
            })->get();

        return view('association.reports.create', get_defined_vars());
    }

    public function store(ReportRequest $request)
    {
        $data = $request->validated();
        $data['association_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('file')) {
            unset($data['file']);
            $data['file'] = $request->file('file')->store('associations/reports', 'public');
        }
        Report::create($data);

        return redirect()->route('association.reports.index')->with('success', 'تم إضافة التقرير بنجاح!');
    }

    public function show(Report $report)
    {
        return view('association.reports.show', get_defined_vars());
    }
}
