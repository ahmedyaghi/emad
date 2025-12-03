<?php

namespace App\Http\Requests\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class VerifyCodeRequest extends FormRequest
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
            'code.*' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code.0' => 'رمز التحقق مطلوب',
            'code.1' => 'رمز التحقق مطلوب',
            'code.2' => 'رمز التحقق مطلوب',
            'code.3' => 'رمز التحقق مطلوب',
        ];
    }
}
