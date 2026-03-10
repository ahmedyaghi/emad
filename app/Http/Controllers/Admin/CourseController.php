<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;
use App\Models\CourseUnit;
use App\Models\CourseUnitLesson;
use App\Models\Lecturer;
use App\Models\Qualification;
use App\Models\Target;
use App\Models\User;
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
        $course->with(['users', 'units.lessons']);
        $top_trainees = $course->users->map(function ($user) use ($course) {
            return [
                'user' => $user,
                'progress' => $course->progressForUser($user),
            ];
        })->sortByDesc('progress')->take(5);

        return view('admin.courses.show', get_defined_vars());
    }

    public function store(CourseRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {

            $course = Course::create([
                'title' => $data['title'],
                'video_url' => $data['video_url'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'qualification_id' => $data['qualification_id'],
                'target_id' => $data['target_id'],
                'description' => $data['description'] ?? null,
                'topics' => $data['topics'] ?? null,
                'goals' => $data['goals'] ?? null,
                'slug' => Str::slug($data['title'], '-'),
            ]);

            if (! empty($data['trainees'])) {
                foreach ($data['trainees'] as $trainee) {
                    $course->users()->attach($trainee);
                }
            }

            if (! empty($data['lecturers'])) {
                foreach ($data['lecturers'] as $lecturer_data) {

                    $lecturer_image = null;

                    if (isset($lecturer_data['image'])) {
                        $image = time() . '.' . $lecturer_data['image']->extension();
                        $lecturer_data['image']->move(public_path('uploads/admin/courses/lecturers'), $image);
                        $lecturer_image = $image;
                    }

                    $lecturer = Lecturer::create([
                        'name' => $lecturer_data['name'],
                        'bio' => $lecturer_data['bio'],
                        'image' => $lecturer_image,
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
                'message' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage(),
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
            $query->orWhere('name', 'like', '%' . request('name') . '%');
        }
        $query->where('type', UserType::INDIVIDUAL);
        $query->with('profile');
        $trainees = $query->get();

        return response()->json($trainees);
    }
}
