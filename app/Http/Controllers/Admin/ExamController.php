<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::paginate(9);
        return view('admin.exams.index', get_defined_vars());
    }

    public function create()
    {
        $types = QuestionType::all();

        return view('admin.exams.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'questions' => 'required|array|min:1',
            'questions.*.name' => 'required|string|max:255',
            'questions.*.type_id' => 'required|exists:question_types,id',
            'questions.*.score' => 'required|numeric',
            'questions.*.correct' => 'required|integer|min:1|max:4',
            'questions.*.answers' => 'required|array|size:4',
            'questions.*.answers.*.title' => 'required|string|max:255',
        ]);

        $exam = Exam::create([
            'title' => 'Exam',
        ]);

        foreach ($request->questions as $qData) {
            $question = Question::create([
                'name' => $qData['name'],
                'type_id' => $qData['type_id'],
                'score' => $qData['score'],
                'correct_answer' => $qData['correct'],
                'exam_id' => $exam->id,
            ]);

            foreach ($qData['answers'] as $answer) {
                $question->answers()->create([
                    'title' => $answer['title'],
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'تم حفظ الاختبار بنجاح!',
            'redirect' => route('admin.exams.index'),
        ]);
    }
}
