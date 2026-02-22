<?php

namespace App\Http\Controllers\Individual;

use App\Enums\TrainingApplicationStatus;
use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Individual\ApplyTrainingOpportunityRequest;
use App\Models\Association;
use App\Models\City;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityApplication;
use App\Models\User;
use Illuminate\Support\Str;

class TrainingOpportunityController extends Controller
{
    public function index()
    {
        $query = TrainingOpportunity::query();
        if (! empty(request('city_id'))) {
            $query = $query->where('city_id', request('city_id'));
        }
        if (! empty(request('published_at'))) {
            $query = $query->whereDate('created_at', request('published_at'));
        }
        if (! empty(request('association_id'))) {
            $query = $query->where('association_id', request('association_id'));
        }
        $training_opportunities = $query->with(['association', 'association.profile']);
        $training_opportunities = $query->withCount('applications');

        $training_opportunities = $query->paginate(9);
        $associations = User::where('status', UserStatus::ACCEPTED)->where('type', UserType::ASSOCIATION)->get();
        $cities = City::all();

        return view('individual.training_opportunities.index', get_defined_vars());
    }

    public function show(TrainingOpportunity $training_opportunity)
    {
        //  dd($training_opportunity);
        $training_opportunity->load(['association']);
        // $model = TrainingOpportunity::with(['association'])->where('slug', $slug)->firstOrFail();
        $has_applied = TrainingOpportunityApplication::where('training_id', $training_opportunity->id)
            ->where('user_id', auth()->id())
            ->exists();

        return view('individual.training_opportunities.show', get_defined_vars());
    }

    public function training_opportunity_applications()
    {
        $query = TrainingOpportunityApplication::query();
        $applications = $query->with(['training', 'user', 'training.association']);

        if (! empty(request('association_id'))) {
            $query = $query->whereHas('training.association', function ($q) {
                return $q->where('association_id', request('association_id'));
            });
        }

        if (! empty(request('city_id'))) {
            $query = $query->whereHas('training', function ($q) {
                return $q->where('city_id', request('city_id'));
            });
        }

        if (! empty(request('published_at'))) {
            $query = $query->whereDate('created_at', request('published_at'));
        }

        $applications = $query->where('user_id', auth()->id())->paginate(6);
        $applications = $query->paginate(9);

        $associations = User::where('type', UserType::ASSOCIATION)->where('status', UserStatus::ACCEPTED)->get();
        $cities = City::all();

        return view('individual.training_opportunity_applications', get_defined_vars());
    }

    public function store(ApplyTrainingOpportunityRequest $request)
    {

        $data = $request->validated();

        if (TrainingOpportunityApplication::where('user_id', auth()->id())->where('training_id', $request->training_id)->exists()) {
            return redirect()->route('individual.training-opportunity-applications')->with('error', 'تم التقديم مسبقاَ علي التدريب !');
        }
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug(TrainingOpportunity::find($request->training_id)->title).'-'.Str::random(6);
        if ($request->hasFile('cv')) {
            unset($data['cv']);
            $data['cv'] = $request->file('cv')->store('training-opportunities/applications', 'public');
        }
        $data['status'] = TrainingApplicationStatus::APPLIED;
        TrainingOpportunityApplication::create($data);

        return redirect()->route('individual.training-opportunity-applications')->with('success', 'تم التقديم على التدريب بنجاح!');
    }

    public function training_opportunity_application_details($slug)
    {
        $application = TrainingOpportunityApplication::with(['training', 'user', 'training.association'])->where('slug', $slug)->firstOrFail();

        return view('individual.training_opportunity_application_details', get_defined_vars());
    }
}
