<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::latest()->paginate(9);

        return view('admin.universities.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:universities,name',
        ]);

        University::create($data);

        return redirect()->route('admin.universities.index')->with('success', 'تمت إضافة الجامعة بنجاح');
    }

    public function update(Request $request, $id)
    {
        $university = University::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255|unique:universities,name,'.$university->id,
        ]);

        $university->update($data);

        return redirect()->route('admin.universities.index')->with('success', 'تم تحديث الجامعة بنجاح');
    }

    public function destroy($id)
    {
        $university = University::findOrFail($id);

        $university->delete();

        return redirect()->route('admin.universities.index')->with('success', 'تم حذف الجامعة بنجاح');
    }
}
