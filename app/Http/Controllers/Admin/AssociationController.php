<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatusEnum;
use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;

class AssociationController extends Controller
{
    public function associations()
    {
        $pending_associations = User::with(['profile'])->where('status', UserStatusEnum::PENDING)->where('type', UserTypeEnum::ASSOCIATION)->paginate(9);
        $accepted_associations = User::with(['profile'])->where('status', UserStatusEnum::ACCEPTED)->where('type', UserTypeEnum::ASSOCIATION)->paginate(9);

        return view('admin.associations.index', get_defined_vars());
    }

    public function association_profile($id)
    {
        $user = User::findOrFail($id);
        $user->load('profile');

        return view('admin.associations.profile', get_defined_vars());
    }
}
