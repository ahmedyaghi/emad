<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Models\User;

class AssociationController extends Controller
{
    public function index()
    {
        $pending_associations = User::with(['profile'])->where('status', UserStatus::PENDING)->where('type', UserType::ASSOCIATION)->paginate(9);
        $accepted_associations = User::with(['profile'])->where('status', UserStatus::ACCEPTED)->where('type', UserType::ASSOCIATION)->paginate(9);

        return view('admin.associations.index', get_defined_vars());
    }

    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);

        return view('admin.associations.show', get_defined_vars());
    }
}
