<?php

namespace App\Http\Controllers\FacultyMember;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyMember\NoteRequest;
use App\Models\Note;
use App\Models\NoteType;
use App\Models\User;

class NoteController extends Controller
{
    public function index()
    {
        $query = Note::where('send_from', auth()->id());

        if (request()->has('keyword') && request('keyword') != '') {
            $keyword = request('keyword');
            $query->where('title', 'like', "%{$keyword}%");
        }

        $notes = $query->paginate(9)->withQueryString();

        return view('faculty-member.notes.index', get_defined_vars());
    }

    public function create()
    {
        $types = NoteType::all();
        $associations = User::where('type', UserType::ASSOCIATION)->where('status', UserStatus::ACCEPTED)->get();

        return view('faculty-member.notes.create', get_defined_vars());
    }

    public function store(NoteRequest $request)
    {
        $data = $request->validated();
        $data['send_from'] = auth()->id();
        Note::create($data);

        return redirect()->route('faculty-member.notes.index')->with('success', 'تم إنشاء الملاحظة بنجاح');
    }
}
