<?php

namespace App\Http\Requests\Individual;

use Illuminate\Foundation\Http\FormRequest;

class QualificationRequest extends FormRequest
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
            'qualification_id' => 'required|exists:qualifications,id',
            'specialization_id' => 'required|exists:specializations,id',
            'university_id' => 'required|exists:universities,id',
            'grade_id' => 'required|exists:grades,id',
            'graduation_year' => 'required|date_format:Y',
        ];
    }
}
