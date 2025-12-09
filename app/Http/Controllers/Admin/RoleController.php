<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(9);
        $users = User::paginate(9);

        return view('admin.roles.index', get_defined_vars());
    }

    public function create()
    {
        $tables = [
            'courses',
            'exams',
        ];

        return view('admin.roles.create', compact('tables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|unique:roles,name',
            'permissions' => 'array',
        ]);

        $role = Role::create(['name' => $request->role]);

        $permissions = $request->input('permissions', []);

        foreach ($permissions as $table => $perms) {
            foreach ($perms as $action => $value) {
                $permissionName = "$action $table";
                $permission = Permission::firstOrCreate(['name' => $permissionName]);
                $role->givePermissionTo($permission);
            }
        }

        return redirect()->route('admin.roles.index')->with('success', 'تم اضافة الدور بنجاح.');
    }
}
