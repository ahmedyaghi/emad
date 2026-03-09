<?php

namespace App\Http\Controllers\Site;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\City;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityType;
use App\Models\User;

class MainController extends Controller
{
    public function main()
    {
        $associations = User::with('profile')->where('type', UserType::ASSOCIATION)->where('status', UserStatus::ACCEPTED)->get();
        $training_opportunities = TrainingOpportunity::with(['association', 'association.profile'])->paginate(9);
        $training_opportunity_types = TrainingOpportunityType::all();
        $articles = Article::with(['user', 'user.profile'])->get();
        $cities = City::all();
        return view('site.main', get_defined_vars());
    }

    public function get_neighborhoods(City $city)
    {
        $neighborhoods = $city->neighborhoods()->select('id', 'name')->get();

        return response()->json($neighborhoods);
    }
}
