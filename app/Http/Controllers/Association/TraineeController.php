<?php

namespace App\Http\Controllers\Association;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Association\TraineeAssessmentRequest;
use App\Models\Evaluation;
use App\Models\GeneralCriteria;
use App\Models\TraineeProgress;
use App\Models\TraineeTask;
use App\Models\TrainingOpportunityApplication;

class TraineeController extends Controller
{
    public function index()
    {

        $query = TrainingOpportunityApplication::query();

        $query->with('user');

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
        $query->where('status', TrainingApplicationStatus::ACCEPTED);
        $trainees = $query->paginate(9);

        return view('association.trainees.index', get_defined_vars());
    }

    public function add_assessment()
    {
        $application = TrainingOpportunityApplication::findOrfail(request('application_id'));
        $general_criterias = GeneralCriteria::all();
        $evaluations = Evaluation::all();

        return view('association.trainees.add_assessment', get_defined_vars());
    }

    public function handle_assessment(TraineeAssessmentRequest $request)
    {

        $application_id = $request->application_id;

        if ($request->has('progress')) {
            foreach ($request->progress as $criteria_id => $progressData) {
                TraineeProgress::updateOrCreate(
                    [
                        'application_id' => $application_id,
                        'criteria_id' => $criteria_id,
                    ],
                    [
                        'evaluation_id' => $progressData['evaluation_id'] ?? null,
                        'hours' => $progressData['hours'] ?? null,
                        'achievement_level' => $progressData['achievement_level'] ?? null,
                        'notes' => $progressData['notes'] ?? null,
                        'recommendation' => $progressData['recommendation'] ?? null,
                        'responsible' => $progressData['responsible'] ?? null,
                        'action' => $progressData['action'] ?? null,
                    ]
                );
            }
        }

        // حفظ TraineeTasks
        if ($request->has('tasks')) {
            foreach ($request->tasks as $taskData) {
                TraineeTask::create([
                    'application_id' => $application_id,
                    'name' => $taskData['description'] ?? null,
                    'description' => $taskData['description'] ?? null,
                    'number_of_hours' => $taskData['hours'] ?? null,
                    'achievement_level' => $taskData['achievement_level'] ?? null,
                    'notes' => $taskData['notes'] ?? null,
                    'evaluation_id' => $taskData['evaluation_id'] ?? null,
                ]);
            }
        }

        return redirect()->route('association.trainees.index')->with('success', 'تم حفظ التقييم بنجاح');
    }

    public function add_report()
    {
        return view('association.trainees.add_report');
    }

    public function show_profile()
    {
        return view('association.trainees.show_profile');
    }

    public function remove_from_training()
    {
        return view('association.trainees');
    }
}
