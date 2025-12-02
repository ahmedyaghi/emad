<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users_count = User::count();
        $trainees_count = User::where('type', UserType::INDIVIDUAL)->count();
        $associations_count = User::where('type', UserType::ASSOCIATION)->count();
        $individuals = User::where('type', UserType::INDIVIDUAL)->latest()->take(3)->get();

        return view('admin.dashboard', get_defined_vars());
    }
}
