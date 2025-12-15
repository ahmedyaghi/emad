<?php

namespace App\Http\Requests\Site\Auth;

use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'specilization_id' => 'required|string|max:255',
        ];

        switch ($this->input('type')) {

            case UserType::INDIVIDUAL->value:

                $rules = array_merge($rules, [
                    'age' => 'required|integer',
                    'gender' => 'required|integer|in:1,2',
                    'university_id' => 'required|string|max:255',
                    'file' => 'nullable|file|mimes:pdf,doc,docx',
                    'city_id' => 'required|string|max:255',
                    'neighabourhood_id' => 'required|string|max:255',
                    'linkedin' => 'required|string|max:255',
                    'skill_id' => 'required|string|max:255',
                    'course_id' => 'required|string|max:255',
                    'type' => 'required|in:' . UserType::INDIVIDUAL->value,
                ]);
                break;
            case UserType::ASSOCIATION->value:

                $rules = array_merge($rules, [
                    'id_number' => 'nullable|string|max:255|unique:users',
                    'image' => 'nullable|file|mimes:png,jpg,jpeg',
                    'section_type_id' => 'required|string|max:255',
                    'country_id' => 'required|string|max:255',
                    'city_id' => 'required|string|max:255',
                    'website' => 'required|string|max:255',
                    'twitter' => 'required|string|max:255',
                    'facebook' => 'required|string|max:255',
                    'youtube' => 'required|string|max:255',
                    'manager_name' => 'required|string|max:255',
                    'manager_phone' => 'required|string|max:255',
                    'manager_email' => 'required|string|max:255',
                    'type' => 'required|in:' . UserType::ASSOCIATION->value,
                ]);
                break;
            case UserType::FACULTY_MEMBER->value:

                $rules = array_merge($rules, [
                    'city_id' => 'required|string|max:255',
                    'section_type_id' => 'required|string|max:255',
                    'country_id' => 'required|string|max:255',
                    'website' => 'required|string|max:255',
                    'twitter' => 'required|string|max:255',
                    'facebook' => 'required|string|max:255',
                    'youtube' => 'required|string|max:255',
                    'type' => 'required|in:' . UserType::FACULTY_MEMBER->value,
                ]);
                break;
            case UserType::CONSULTANT->value:

                $rules = array_merge($rules, [
                    'gender' => 'required|integer|in:1,2',
                    'work_type_id' => 'required|string|max:255',
                    'nationality_id' => 'required|string|max:255',
                    'place_type_id' => 'required|string|max:255',
                    'type' => 'required|in:' . UserType::CONSULTANT->value,
                ]);
                break;

            default:
                throw new \InvalidArgumentException('Invalid type');
        }

        return $rules;
    }
}
