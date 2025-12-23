<?php

namespace App\Http\Requests\Association;

use Illuminate\Foundation\Http\FormRequest;

class TrainingOpportunityRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:training_opportunities',
            'vacancies_count' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'city_id' => 'required|exists:cities,id',
            'type_id' => 'required|exists:training_opportunity_types,id',
            'qualification_id' => 'required|exists:qualifications,id',
            'consultant_id' => 'required|exists:users,id',
            'faculty_member_id' => 'required|exists:users,id',
            'target' => 'required|in:1,2,3',
            'salary' => 'required|string',
            'short_description' => 'required|string',
            'features' => 'required|string',
            'responsibilities' => 'required|string',
            'conditions' => 'required|string',

        ];
    }
}
