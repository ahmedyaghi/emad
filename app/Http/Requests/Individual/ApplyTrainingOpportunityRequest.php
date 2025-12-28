<?php

namespace App\Http\Requests\Individual;

use Illuminate\Foundation\Http\FormRequest;

class ApplyTrainingOpportunityRequest extends FormRequest
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
            'cv' => 'required|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string|max:2000',
            'training_id' => 'required|exists:training_opportunities,id',
        ];
    }
}
