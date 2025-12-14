<?php

namespace App\Http\Requests\Association;

use Illuminate\Foundation\Http\FormRequest;

class TraineeAssessmentRequest extends FormRequest
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
    $rules = [];

    if($this->has('progress')) {
        foreach ($this->input('progress') as $criteria_id => $data) {
            // إذا فيه evaluation_id (Type 1)
            if(isset($data['evaluation_id'])) {
                $rules["progress.$criteria_id.evaluation_id"] = 'required|exists:evaluations,id';
            }
            // ساعات و achievement_level يمكن تركها nullable
            $rules["progress.$criteria_id.hours"] = 'nullable|numeric';
            $rules["progress.$criteria_id.achievement_level"] = 'nullable|string';
            $rules["progress.$criteria_id.notes"] = 'nullable|string';
            $rules["progress.$criteria_id.recommendation"] = 'nullable|string';
            $rules["progress.$criteria_id.responsible"] = 'nullable|string';
            $rules["progress.$criteria_id.action"] = 'nullable|string';
        }
    }

    return $rules;
}

    public function messages()
    {
        return [
            'application_id.required' => 'حقل المعرف الخاص بالتطبيق مطلوب.',
            'application_id.exists' => 'التطبيق غير موجود.',
            'tasks.*.hours.numeric' => 'عدد الساعات يجب أن يكون رقم.',
            'tasks.*.date.date_format' => 'صيغة التاريخ غير صحيحة.',
            'progress.*.hours.numeric' => 'الوزن النسبي يجب أن يكون رقماً.',
            'progress.*.hours.min' => 'الوزن النسبي لا يمكن أن يكون سالب.',
            'progress.*.hours.max' => 'الوزن النسبي لا يمكن أن يتجاوز 100%.',
        ];
    }
}
