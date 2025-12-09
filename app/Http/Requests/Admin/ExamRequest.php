<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'datetime' => 'required',
            'course_id' => 'required|exists:courses,id',
            'questions' => 'required|array|min:1',
            'questions.*.name' => 'required|string|max:255',
            'questions.*.type_id' => 'required|exists:question_types,id',
            'questions.*.score' => 'required|numeric',
            'questions.*.correct' => 'required|integer|min:1|max:4',
            'questions.*.answers' => 'required|array|size:4',
            'questions.*.answers.*.title' => 'required|string|max:255',
        ];
    }
}
