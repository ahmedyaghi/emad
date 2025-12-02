<?php

namespace App\Http\Controllers\Individual;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Individual\ApplyTrainingOpportunityRequest;
use App\Models\Association;
use App\Models\City;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityApplication;
use Illuminate\Support\Str;

class TrainingOpportunityController extends Controller
{
    public function training_opportunities()
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
        $training_opportunities = $query->with('association');
        $training_opportunities = $query->paginate(9);
        $associations = Association::all();
        $cities = City::all();

        return view('individual.training_opportunities', get_defined_vars());
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

        $associations = Association::all();
        $cities = City::all();

        return view('individual.training_opportunity_applications', get_defined_vars());
    }

    public function training_opportunity($slug)
    {
        $model = TrainingOpportunity::with(['association'])->where('slug', $slug)->firstOrFail();
        $has_applied = TrainingOpportunityApplication::where('training_id', $model->id)
            ->where('user_id', auth()->id())
            ->exists();

        return view('individual.training_opportunity', get_defined_vars());
    }

    public function apply_training_opportunities(ApplyTrainingOpportunityRequest $request)
    {

        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug(TrainingOpportunity::find($request->training_id)->title);
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
