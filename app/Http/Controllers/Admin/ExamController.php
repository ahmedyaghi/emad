<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExamRequest;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Support\Facades\DB;

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
        $exams = $query->paginate(9);

        return view('admin.exams.index', get_defined_vars());
    }

    public function create()
    {
        $types = QuestionType::all();
        $courses = Course::all();

        return view('admin.exams.create', get_defined_vars());
    }

    public function store(ExamRequest $request)
    {
        $data = $request->validated();
        DB::beginTransaction();
        try {

            $exam = Exam::create([
                'title' => $data['title'],
                'datetime' => $data['datetime'],
            ]);
            $exam->courses()->attach($data['course_id']);

            foreach ($data['questions'] as $item) {

                $question = Question::create([
                    'name' => $item['name'],
                    'type_id' => $item['type_id'],
                    'score' => $item['score'],
                    'exam_id' => $exam->id,
                ]);

                foreach ($item['answers'] as $aIndex => $answer) {
                    $question->answers()->create([
                        'title' => $answer['title'],
                        'order' => $aIndex + 1,
                        'is_correct' => ($aIndex + 1) == $item['correct'] ? true : false,
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'تم إضافة الاختبار بنجاح',
                'redirect' => route('admin.exams.index'),

            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء الحفظ: '.$e->getMessage(),
            ], 500);
        }
    }
}
