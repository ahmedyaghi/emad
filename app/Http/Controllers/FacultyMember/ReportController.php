<?php

namespace App\Http\Controllers\FacultyMember;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyMember\ReportRequest;
use App\Models\Report;
use App\Models\TrainingOpportunityApplication;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function index()
    {
        $query = Report::with('application')->where('faculty_member_id', auth()->id());

        if (request()->has('keyword') && request('keyword') != '') {
            $keyword = request('keyword');
            $query->where('title', 'like', "%{$keyword}%");
        }

        $reports = $query->paginate(9)->withQueryString();

        return view('faculty-member.reports.index', get_defined_vars());
    }

    public function create()
    {
        $applications = TrainingOpportunityApplication::with('user')->where('status', TrainingApplicationStatus::ACCEPTED)
            ->whereHas('training', function ($q) {
                $q->where('faculty_member_id', auth()->id());
            })->get();

        return view('faculty-member.reports.create', get_defined_vars());
    }

    public function store(ReportRequest $request)
    {
        $data = $request->validated();
        $data['faculty_member_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('file')) {
            unset($data['file']);
            $data['file'] = $request->file('file')->store('faculty_members/reports', 'public');
        }
        Report::create($data);

        return redirect()->route('faculty-member.reports.index')->with('success', 'تم إضافة التقرير بنجاح!');
    }
}
