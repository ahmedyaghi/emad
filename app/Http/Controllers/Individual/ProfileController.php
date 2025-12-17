<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Http\Requests\Individual\AttachmentRequest;
use App\Http\Requests\Individual\ExperienceRequest;
use App\Http\Requests\Individual\QualificationRequest;
use App\Models\City;
use App\Models\Grade;
use App\Models\Position;
use App\Models\Qualification;
use App\Models\Specialization;
use App\Models\University;
use App\Models\UserAttachment;
use App\Models\UserExperience;
use App\Models\UserFinancialData;
use App\Models\UserQualification;

class ProfileController extends Controller
{
    public function profile()
    {
        $qualifications = Qualification::all();
        $specializations = Specialization::all();
        $universities = University::all();
        $grades = Grade::all();
        $positions = Position::all();
        $cities = City::all();
        $user_qualifications = UserQualification::with(['qualification', 'university', 'specialization', 'grade'])->where('user_id', auth()->id())->get();
        $user_experiences = UserExperience::with(['city', 'position'])->where('user_id', auth()->id())->get();
        $financial_data = UserFinancialData::where('user_id', auth()->id())->get();
        $user_attachments = UserAttachment::where('user_id', auth()->id())->get();
        $user = auth()->user();

        return view('individual.profile', get_defined_vars());
    }

    public function add_qualification(QualificationRequest $request)
    {
        $data = $request->validated();
        auth()->user()->qualifications()->create($data);

        return redirect()->route('individual.profile')->with('success', 'تم إضافة المؤهل العلمي بنجاح');
    }

    public function add_experience(ExperienceRequest $request)
    {
        $data = $request->validated();
        auth()->user()->experiences()->create($data);

        return redirect()->route('individual.profile')->with('success', 'تم إضافة الخبرة بنجاح');
    }

    public function add_attachment(AttachmentRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('file')) {
            unset($data['file']);
            $data['file'] = $request->file('file')->store('users/attachments', 'public');
        }
        auth()->user()->attachments()->create($data);

        return redirect()->route('individual.profile')->with('success', 'تم إضافة المرفق بنجاح');
    }

    public function update_qualification(QualificationRequest $request)
    {
        $user_qualification = UserQualification::findOrfail($request->qualification_form_id);
        $data = $request->validated();
        $user_qualification->update($data);

        return redirect()->route('individual.profile')->with('success', 'تم تعديل المؤهل العلمي بنجاح');
    }

    public function update_experience(ExperienceRequest $request)
    {
        $user_experience = UserExperience::findOrfail($request->experience_form_id);
        $data = $request->validated();
        $user_experience->update($data);

        return redirect()->route('individual.profile')->with('success', 'تم تعديل الخبرة بنجاح');
    }
}
