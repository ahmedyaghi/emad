<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunity;

class TraineeController extends Controller
{
    public function index()
    {

        $query = TrainingOpportunity::where('faculty_member_id', auth()->id())->whereHas('applications')->with(['applications.user', 'applications.training']);

        if (request()->has('keyword') && request('keyword') != '') {
            $keyword = request('keyword');
            $query->whereHas('applications.user', function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%");
            });
        }
        $trainees = $query->paginate(9)->withQueryString();

        return view('faculty-member.trainees.index', get_defined_vars());
    }
}
