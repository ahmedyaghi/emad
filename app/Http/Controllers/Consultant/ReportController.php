<?php

namespace App\Http\Controllers\Consultant;

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
        $reports = Report::with('application')->where('consultant_id', auth()->id())->paginate(9);

        return view('consultant.reports.index', get_defined_vars());
    }

    public function create()
    {
        $applications = TrainingOpportunityApplication::with('user')->where('status', TrainingApplicationStatus::ACCEPTED)
            ->whereHas('training', function ($q) {
                $q->where('consultant_id', auth()->id());
            })->get();

        return view('consultant.reports.create', get_defined_vars());
    }

    public function store(ReportRequest $request)
    {
        $data = $request->validated();
        $data['consultant_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('file')) {
            unset($data['file']);
            $data['file'] = $request->file('file')->store('consultants/reports', 'public');
        }
        Report::create($data);

        return redirect()->route('consultant.reports.index')->with('success', 'تم إضافة التقرير بنجاح!');
    }
}
