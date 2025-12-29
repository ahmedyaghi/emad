<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'video_url' => 'required|url',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'qualification_id' => 'required|exists:qualifications,id',
            'target_id' => 'required|exists:targets,id',
            'description' => 'required|string',
            'topics' => 'required|string',
            'goals' => 'required|string',
            'lecturers' => 'required|array|min:1',
            'lecturers.*.name' => 'required|string|max:255',
            'lecturers.*.bio' => 'required|string',
            'lecturers.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'units' => 'required|array|min:1',
            'units.*.name' => 'required|string|max:255',
            'units.*.lessons' => 'required|array|min:1',
            'units.*.lessons.*.name' => 'required|string|max:255',
            'units.*.lessons.*.link' => 'required|string|max:255',
            'trainees' => 'required|array|min:1',
        ];
    }
}
