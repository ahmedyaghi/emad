<?php

namespace App\Http\Controllers\Association;

use App\Enums\TrainingApplicationStatus;
use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Association\TrainingOpportunityRequest;
use App\Models\City;
use App\Models\Qualification;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityApplication;
use App\Models\TrainingOpportunityType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrainingOpportunityController extends Controller
{
    public function index()
    {
        $query = TrainingOpportunity::query();
        if (! empty(request('created_at'))) {
            $query = $query->whereDate('created_at', request('created_at'));
        }
        if (! empty(request('end_date'))) {
            $query = $query->whereDate('end_date', request('end_date'));
        }
        if (! empty(request('status'))) {
            $query = $query->where('status', request('status'));
        }

        $training_opportunities = $query->with('association');
        $training_opportunities = $query->withCount('applications');
        $training_opportunities = $query->where('association_id', auth()->id());
        $training_opportunities = $query->paginate(9);

        return view('association.training_opportunities.index', get_defined_vars());
    }

    public function show(TrainingOpportunity $training_opportunity)
    {
        $applied_applications = TrainingOpportunityApplication::with(['user', 'user.profile'])
            ->where('training_id', $training_opportunity->id)
            ->where('status', TrainingApplicationStatus::APPLIED)
            ->paginate(9);

        $reviewed_applications = TrainingOpportunityApplication::with(['user', 'user.profile'])
            ->where('training_id', $training_opportunity->id)
            ->where('status', TrainingApplicationStatus::REVIEWED)
            ->paginate(9);

        $accepted_applications = TrainingOpportunityApplication::with(['user', 'user.profile'])
            ->where('training_id', $training_opportunity->id)
            ->where('status', TrainingApplicationStatus::ACCEPTED)
            ->paginate(9);

        $rejected_applications = TrainingOpportunityApplication::with(['user', 'user.profile'])
            ->where('training_id', $training_opportunity->id)
            ->where('status', TrainingApplicationStatus::REJECTED)
            ->paginate(9);

        return view('association.training_opportunities.show', get_defined_vars());
    }

    public function create()
    {
        $types = TrainingOpportunityType::all();
        $cities = City::all();
        $qualifications = Qualification::all();
        $consultants = User::with(['profile'])->where('status', UserStatus::ACCEPTED)->where('type', UserType::CONSULTANT)->get();
        $faculty_members = User::with(['profile'])->where('status', UserStatus::ACCEPTED)->where('type', UserType::FACULTY_MEMBER)->get();

        return view('association.training_opportunities.create', get_defined_vars());
    }

    public function store(TrainingOpportunityRequest $request)
    {
        $data = $request->validated();
        $data['association_id'] = auth()->id();
        if (! is_null(request('target'))) {
            switch (request('target')) {
                case 1:
                    $data['for_male'] = 1;
                    break;
                case 2:
                    $data['for_female'] = 1;
                    break;
                case 3:
                    $data['for_male'] = 1;
                    $data['for_female'] = 1;
                    break;
            }
        }
        // $data['start_date'] = date('Y-m-d', strtotime($data['start_date']));
        // $data['end_date'] = date('Y-m-d', strtotime($data['end_date']));
        $data['slug'] = Str::slug($data['title']);
        $data['status'] = 1;
        unset($data['target']);
        TrainingOpportunity::create($data);

        return redirect()->route('association.training-opportunities.index')->with('success', 'تم إضافة الدورة التدريبية بنجاح');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $application = TrainingOpportunityApplication::findOrFail($id);

        $application->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح');

    }
}
