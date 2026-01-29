<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(9);

        return view('admin.users.index', get_defined_vars());
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', get_defined_vars());
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['email_verified_at'] = now();
        $data['status'] = UserStatus::ACCEPTED;
        unset($data['role_id']);
        $user = User::create($data);
        $user->roles()->attach([$request->role_id]);
        $user->profile()->create([]);

        return redirect()->route('admin.users.index')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    public function update_status($status, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => $status,
        ]);

        return redirect()->route('admin.associations.index')->with('success', 'تم تعديل الحالة بنجاح');
    }
}
