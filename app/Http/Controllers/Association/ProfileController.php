<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $association = auth()->user();

        return view('association.profile.index', get_defined_vars());
    }

    public function edit($id)
    {
        $association = auth()->user();
        if ($association->id != $id) {
            abort(403);
        }
        $nationalities = \App\Models\Nationality::all();
        $countries = \App\Models\Country::all();

        return view('association.profile.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $association = auth()->user();
        if ($association->id != $id) {
            abort(403);
        }
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,'.$association->id,
            'id_number' => 'nullable|string|max:255|unique:users,id_number,'.$association->id,
            'phone' => 'nullable|string|max:255|unique:users,phone,'.$association->id,
            'gender' => 'nullable|integer|in:1,2',
            'data_of_birth' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $association->update([
            'name' => $data['name'] ?? $association->name,
            'email' => $data['email'] ?? $association->email,
            'phone' => $data['phone'] ?? $association->phone,
            'id_number' => $data['id_number'] ?? $association->id_number,
        ]);

        if ($request->hasFile('image')) {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/users/profiles'), $image);
            $association->profile()->update([
                'image' => $image,
            ]);
        }

        $association->profile()->update([
            'gender' => $data['gender'] ?? $association->profile->gender,
            'date_of_birth' => $data['date_of_birth'] ?? $association->profile->date_of_birth,
        ]);

        return redirect()->route('association.profile.index')->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
}
