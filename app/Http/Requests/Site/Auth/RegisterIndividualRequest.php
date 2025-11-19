<?php

namespace App\Http\Requests\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterIndividualRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255',
            'age' => 'required|integer',
            'sex' => 'required|integer|in:1,2',
            'university_id' => 'required|string|max:255',
            'specilization_id' => 'required|string|max:255',
            'city_id' => 'required|string|max:255',
            'neighabourhood_id' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'linkedin' => 'required|string|max:255',
            'skill_id' => 'required|string|max:255',
            'course_id' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx',

        ];
    }
}
