<?php

namespace App\Http\Requests\Association;

use Illuminate\Foundation\Http\FormRequest;

class AssessmentRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'application_id' => 'required|exists:training_opportunity_applications,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ];

        if ($this->has('progress')) {
            foreach ($this->input('progress') as $criteria_id => $data) {

                if (isset($data['evaluation_id'])) {
                    $rules["progress.$criteria_id.evaluation_id"] = 'required|exists:evaluations,id';
                }
                $rules["progress.$criteria_id.number_of_hours"] = 'nullable|integer';
                $rules["progress.$criteria_id.achievement_level"] = 'nullable|string';
                $rules["progress.$criteria_id.notes"] = 'nullable|string';
                $rules["progress.$criteria_id.recommendations"] = 'nullable|string';
                $rules["progress.$criteria_id.responsible_side"] = 'nullable|string';
                $rules["progress.$criteria_id.action_required"] = 'nullable|string';
            }
        }

        return $rules;
    }
}
