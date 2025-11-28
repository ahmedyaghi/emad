<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users_count = User::count();
        $trainees_count = User::where('type', UserTypeEnum::INDIVIDUAL)->count();
        $associations_count = User::where('type', UserTypeEnum::ASSOCIATION)->count();
        $individuals = User::where('type', UserTypeEnum::INDIVIDUAL)->latest()->take(3)->get();

        return view('admin.dashboard', get_defined_vars());
    }
}
