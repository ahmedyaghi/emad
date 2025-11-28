<?php

namespace App\Http\Controllers\FacultyMember;

use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function notes()
    {
        return view('faculty-member.notes');
    }
}
