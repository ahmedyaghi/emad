<?php

namespace App\Http\Controllers\Association;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\TrainingOpportunityApplication;

class TraineeController extends Controller
{
    public function index()
    {

        $query = TrainingOpportunityApplication::query();

        $query->with('user');
        $query->where('status', TrainingApplicationStatus::ACCEPTED);
        $query->whereHas('training', function ($q) {
            $q->where('association_id', auth()->id());
        });

        if (! empty(request('created_at'))) {
            $query = $query->whereDate('created_at', request('created_at'));
        }

        if (! empty(request('course_title'))) {
            $query = $query->whereHas('training', function ($q) {
                $q->where('title', 'like', '%'.request('course_title').'%');
            });
        }

        if (! empty(request('trainee_name'))) {
            $query = $query->whereHas('user', function ($q) {
                $q->where('name', 'like', '%'.request('trainee_name').'%');
            });
        }

        $trainees = $query->paginate(9);

        return view('association.trainees.index', get_defined_vars());
    }
}
