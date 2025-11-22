<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\City;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityType;

class TrainingOpportunityController extends Controller
{
    public function training_opportunities()
    {
        $query = TrainingOpportunity::query();
        if (! empty(request('city_id'))) {
            $query = $query->where('city_id', request('city_id'));
        }
        if (! empty(request('type_id'))) {
            $query = $query->where('type_id', request('type_id'));
        }
        if (! empty(request('association_id'))) {
            $query = $query->where('association_id', request('association_id'));
        }
        if (! empty(request('sex'))) {
            if (request('sex') == 1) {
                $query = $query->where('for_male', 1);
            }
            if (request('sex') == 2) {
                $query = $query->where('for_female', 1);
            }
        }
        $training_opportunities = $query->with('association');
        $training_opportunities = $query->paginate((request()->has('per_page') && ! empty(request('per_page')) ? request('per_page') : 9));

        $training_opportunity_types = TrainingOpportunityType::all();
        $associations = Association::all();
        $cities = City::all();

        return view('site.training_opportunities', get_defined_vars());
    }

    public function training_opportunity($slug)
    {
        $training_opportunity = TrainingOpportunity::with(['association'])->where('slug', $slug)->firstOrFail();

        return view('site.training_opportunity', compact('training_opportunity'));
    }
}
