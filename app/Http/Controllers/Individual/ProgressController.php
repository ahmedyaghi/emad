<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\UserLessonProgress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'lesson_id' => 'required|exists:course_unit_lessons,id',
        ]);

        UserLessonProgress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'lesson_id' => $request->lesson_id,
            ],
            [
                'is_completed' => 1,
            ]
        );

        return response()->json(['success' => true]);
    }
}
