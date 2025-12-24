<?php

namespace App\Http\Controllers\Association;

use App\Enums\TrainingApplicationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Association\AssessmentRequest;
use App\Models\Assessment;
use App\Models\Evaluation;
use App\Models\GeneralCriteria;
use App\Models\TrainingOpportunityApplication;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::whereHas('application.training', function ($q) {
            $q->where('association_id', auth()->id());
        })->paginate(9);

        return view('association.assessments.index', get_defined_vars());
    }

    public function create()
    {
        $general_criterias = GeneralCriteria::all();
        $evaluations = Evaluation::all();
        $applications = TrainingOpportunityApplication::with('user')->where('status', TrainingApplicationStatus::ACCEPTED)
            ->whereHas('training', function ($q) {
                $q->where('association_id', auth()->id());
            })->get();

        return view('association.assessments.create', get_defined_vars());
    }

    public function store(AssessmentRequest $request)
    {
        $data = $request->validated();
        $has_assessment = Assessment::where('application_id', $data['application_id'])->exists();
        if ($has_assessment) {
            return redirect()->route('association.assessments.index')->with('error', 'تم إضافة التقييم مسبقاَ');
        }

        $assessment = Assessment::create([
            'application_id' => $data['application_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => 1,
        ]);

        if ($request->has('progress')) {
            foreach ($request->progress as $criteria_id => $progressData) {

                $assessment->criterias()->create([
                    'criteria_id' => $criteria_id,
                    'evaluation_id' => $progressData['evaluation_id'] ?? null,
                    'notes' => $progressData['notes'] ?? null,
                    'weight_percentage' => $progressData['weight_percentage'] ?? null,
                    'achievement_level' => $progressData['achievement_level'] ?? null,
                    'recommendations' => $progressData['recommendations'] ?? null,
                    'responsible_side' => $progressData['responsible_side'] ?? null,
                    'action_required' => $progressData['action_required'] ?? null,

                ]);
            }
        }

        if ($request->has('tasks')) {
            foreach ($request->tasks as $taskData) {
                $assessment->tasks()->create([
                    'assessment_id' => $assessment->id,
                    'date' => date('Y-m-d', strtotime($taskData['date'])) ?? null,
                    'name' => $taskData['name'] ?? null,
                    'number_of_hours' => $taskData['number_of_hours'] ?? null,
                    'achievement_level' => $taskData['achievement_level'] ?? null,
                    'description' => $taskData['description'] ?? null,
                    'notes' => $taskData['notes'] ?? null,
                ]);
            }
        }

        return redirect()->route('association.assessments.index')->with('success', 'تم حفظ التقييم بنجاح');
    }

    public function show($id)
    {
        $assessment = Assessment::with(['application', 'criterias.evaluation', 'criterias.criteria'])->findOrFail($id);

        return view('association.assessments.show', get_defined_vars());
    }
}
