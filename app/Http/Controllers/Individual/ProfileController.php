<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\UserAttachment;
use App\Models\UserExperience;
use App\Models\UserFinancialData;
use App\Models\UserQualification;

class ProfileController extends Controller
{
    public function profile()
    {
        $qualifications = UserQualification::where('user_id', auth()->id())->get();
        $experiences = UserExperience::where('user_id', auth()->id())->get();
        $financial_data = UserFinancialData::where('user_id', auth()->id())->get();
        $attachments = UserAttachment::where('user_id', auth()->id())->get();

        return view('individual.profile', get_defined_vars());
    }
}
