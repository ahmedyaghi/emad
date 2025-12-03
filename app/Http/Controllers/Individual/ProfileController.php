<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Grade;
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
        $user_qualifications = UserQualification::where('user_id', auth()->id())->get();
        $experiences = UserExperience::where('user_id', auth()->id())->get();
        $financial_data = UserFinancialData::where('user_id', auth()->id())->get();
        $attachments = UserAttachment::where('user_id', auth()->id())->get();
        $user = auth()->user();
        return view('individual.profile', get_defined_vars());
    }
}
