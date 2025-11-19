<?php

namespace App\Http\Requests\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterConsultantRequest extends FormRequest
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
            'sex' => 'required|integer|in:1,2',
            'work_type_id' => 'required|string|max:255',
            'specilization_id' => 'required|string|max:255',
            'nationality_id' => 'required|string|max:255',
            'place_type_id' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ];
    }
}
