<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {

        $courses = Course::all();

        $query = Exam::query();

        if (! empty(request('date'))) {
            $query = $query->whereDate('datetime', 'like', request('date'));
        }
        if (! empty(request('course_id'))) {
            $query = $query->whereHas('courses', function ($q) {
                $q->where('courses.id', request('course_id'));
            });
        }

        $query->with('examAnswers');
        $query->whereHas('courses', function ($q) {
            $q->whereIn('courses.id', Auth::user()->courses->pluck('id'));
        });
        $exams = $query->paginate(9);

        return view('individual.exams.index', get_defined_vars());
    }

    public function create()
    {
        $exam = Exam::findOrfail(request('exam'));
        $exam->load('questions.answers');
        $exam_answer = ExamAnswer::where('user_id', auth()->id())->where('exam_id', $exam->id)->count() > 0;

        return view('individual.exams.start', compact('exam', 'exam_answer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'answers' => 'required|array',
        ]);

        $exam = Exam::findOrfail($request->exam_id);

        $exam->load('questions.answers');

        $user = Auth::user();
        $score = 0;
        $total = $exam->questions()->sum('score');

        $exam_answer = ExamAnswer::where('user_id', $user->id)->where('exam_id', $exam->id)->first();
        if (! is_null($exam_answer)) {
            return response()->json([
                'success' => false,
                'message' => 'تم تقديم الاختبار',
            ]);
        }
        foreach ($request->answers as $q => $a) {
            $isCorrect = false;
            $question = $exam->questions->find($q);
            $correct_answer = $question->answers->where('is_correct', true)->pluck('id')->first();
            if ($correct_answer == $a) {
                $score += $question->score;
                $isCorrect = true;
            }

            ExamAnswer::create([
                'user_id' => $user->id,
                'exam_id' => $exam->id,
                'question_id' => $q,
                'answer_id' => $a,
                'is_correct' => $isCorrect,
                'score' => $score,
            ]);
        }

        return response()->json([
            'success' => true,
            'score' => $score,
            'total' => $total,
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $exam = Exam::findOrfail($id);

        $exam->load(['questions.answers', 'examAnswers' => function ($q) use ($user) {
            $q->where('user_id', $user->id);
        }]);

        return view('individual.exams.result', compact('exam'));
    }
}
