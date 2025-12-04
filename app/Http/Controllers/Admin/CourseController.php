<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseUnit;
use App\Models\CourseUnitLesson;
use App\Models\Lecturer;
use App\Models\Qualification;
use App\Models\Target;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate();

        return view('admin.courses.index', get_defined_vars());
    }

    public function create()
    {
        $qualifications = Qualification::all();
        $targets = Target::all();

        return view('admin.courses.create', get_defined_vars());
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', get_defined_vars());
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {

            $course = Course::create([
                'title' => $data['title'],
                'start_date' => date('Y-m-d', strtotime($data['start_date'])),
                'end_date' => date('Y-m-d', strtotime($data['end_date'])),
                'qualification_id' => $data['qualification_id'],
                'target_id' => $data['target_id'],
                'description' => $data['description'] ?? null,
                'topics' => $data['topics'] ?? null,
                'goals' => $data['goals'] ?? null,
                'slug' => Str::slug($data['title'], '-'),
            ]);

            if (! empty($data['lecturers'])) {
                foreach ($data['lecturers'] as $lecturer_data) {
                    $lecturer = Lecturer::create([
                        'name' => $lecturer_data['name'],
                        'bio' => $lecturer_data['bio'] ?? null,
                    ]);
                    $course->lecturers()->attach($lecturer->id);
                }
            }

            if (! empty($data['units'])) {
                foreach ($data['units'] as $unitIndex => $unitData) {
                    $unit = CourseUnit::create([
                        'course_id' => $course->id,
                        'name' => $unitData['name'],
                    ]);

                    if (! empty($unitData['lessons'])) {
                        foreach ($unitData['lessons'] as $lessonIndex => $lessonData) {
                            CourseUnitLesson::create([
                                'unit_id' => $unit->id,
                                'title' => $lessonData['name'],
                                'video_url' => $lessonData['link'],
                            ]);
                        }
                    }
                }
            }

            if (! empty($data['trainees'])) {
                foreach ($data['trainees'] as $traineeData) {
                    $course->users()->attach($traineeData);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'تم إضافة الدورة بنجاح',
                'redirect' => route('admin.courses.index'),

            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء الحفظ: '.$e->getMessage(),
            ], 500);
        }
    }

    public function search_trainee()
    {

        $query = User::query();

        if (! empty(request('id'))) {
            $query->where('id_number', request('id'));
        }

        if (! empty(request('name'))) {
            $query->orWhere('name', 'like', '%'.request('name').'%');
        }
        $query->where('type', UserType::INDIVIDUAL);
        $trainees = $query->get();

        return response()->json($trainees);
    }
}
