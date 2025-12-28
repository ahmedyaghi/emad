<?php

namespace App\Http\Controllers\FacultyMember;

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
        $query = Assessment::with('application')->where('faculty_member_id', auth()->id());

        if (request()->has('keyword') && request('keyword') != '') {
            $keyword = request('keyword');
            $query->where('name', 'like', "%{$keyword}%");
        }

        $assessments = $query->paginate(9)->withQueryString();

        return view('faculty-member.assessments.index', get_defined_vars());
    }

    public function create()
    {
        $general_criterias = GeneralCriteria::all();
        $evaluations = Evaluation::all();
        $applications = TrainingOpportunityApplication::with('user')->where('status', TrainingApplicationStatus::ACCEPTED)
            ->whereHas('training', function ($q) {
                $q->where('faculty_member_id', auth()->id());
            })->get();

        return view('faculty-member.assessments.create', get_defined_vars());
    }

    public function store(AssessmentRequest $request)
    {
        $data = $request->validated();
        $has_assessment = Assessment::where('application_id', $data['application_id'])->where('faculty_member_id', auth()->id())->exists();
        if ($has_assessment) {
            return redirect()->route('faculty-member.assessments.index')->with('error', 'تم إضافة التقييم مسبقاَ');
        }

        $assessment = Assessment::create([
            'application_id' => $data['application_id'],
            'faculty_member_id' => auth()->id(),
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

        return redirect()->route('faculty-member.assessments.index')->with('success', 'تم حفظ التقييم بنجاح');
    }

    public function show($id)
    {
        $assessment = Assessment::with(['application', 'criterias.evaluation', 'criterias.criteria'])->findOrFail($id);

        return view('faculty-member.assessments.show', get_defined_vars());
    }
}
