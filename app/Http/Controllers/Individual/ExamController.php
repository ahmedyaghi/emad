<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function exams()
    {
        $exams = Exam::whereHas('courses', function ($q) {
            $q->whereIn('courses.id', Auth::user()->courses->pluck('id'));
        })->paginate(9);

        return view('individual.exams.index', compact('exams'));
    }

    public function start_exam(Exam $exam)
    {
        $exam->load('questions.answers');
        $exam_answer = ExamAnswer::where('user_id', auth()->id())->where('exam_id', $exam->id)->count() > 0;

        return view('individual.exams.start', compact('exam', 'exam_answer'));
    }

    public function submit(Request $request, Exam $exam)
    {
        $request->validate([
            'answers' => 'required|array',
        ]);

        $exam->load('questions.answers');

        $user = Auth::user();
        $score = 0;
        $total = $exam->questions()->sum('score');

        $exam_answer = ExamAnswer::where('user_id', $user->id)->where('exam_id', $exam->id)->first();
        if ($exam_answer->exists()) {
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

    public function exam_result(Exam $exam)
    {
        $user = Auth::user();
        $exam->load(['questions.answers', 'examAnswers' => function ($q) use ($user) {
            $q->where('user_id', $user->id);
        }]);

        return view('individual.exams.result', compact('exam'));
    }
}
