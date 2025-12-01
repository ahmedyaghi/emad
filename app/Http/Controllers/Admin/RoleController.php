<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::paginate(9);
        $roles = Role::paginate(9);

        return view('admin.roles.index', get_defined_vars());
    }
}
