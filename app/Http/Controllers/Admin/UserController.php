<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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

        return view('admin.users.form', get_defined_vars());
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.form', get_defined_vars());
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

    public function update(Request $request, User $user)
    {
        if ($request->has('status')) {

            $user->status = UserStatus::from($request->status);
            $user->save();

            return back()->with('success', 'تم تحديث حالة المستخدم');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'تم تحديث بيانات المستخدم');
    }

    public function update_status($status, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => $status,
        ]);

        return redirect()->route('admin.associations.index')->with('success', 'تم تعديل الحالة بنجاح');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }
}
