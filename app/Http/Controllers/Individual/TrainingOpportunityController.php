<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Http\Requests\Individual\ApplyTrainingOpportunityRequest;
use App\Models\TrainingOpportunity;
use App\Models\TrainingOpportunityApplication;

class TrainingOpportunityController extends Controller
{
    public function training_opportunities()
    {
        $training_opportunities = TrainingOpportunity::with(['association'])->paginate(9);

        return view('individual.training_opportunities', get_defined_vars());
    }

    public function my_training_opportunities()
    {
        return view('individual.my_training_opportunities');
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
        if ($request->hasFile('cv')) {
            unset($data['cv']);
            $data['cv'] = $request->file('cv')->store('training-opportunities/applications', 'public');
        } 
        TrainingOpportunityApplication::create($data);

        return redirect()->back()->with('success', 'تم التقديم على التدريب بنجاح!');
    }
}
