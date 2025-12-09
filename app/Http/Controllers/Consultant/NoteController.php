<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consultant\NoteRequest;
use App\Models\Note;
use App\Models\NoteType;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('send_from', auth()->id())->paginate(9);

        return view('consultant.notes.index', get_defined_vars());
    }

    public function create()
    {
        $types = NoteType::all();

        return view('consultant.notes.create', get_defined_vars());
    }

    public function store(NoteRequest $request)
    {
        $data = $request->validated();
        $data['send_from'] = auth()->id();
        Note::create($data);

        return redirect()->route('consultant.notes.index')->with('success', 'تم إنشاء الملاحظة بنجاح');
    }
}
