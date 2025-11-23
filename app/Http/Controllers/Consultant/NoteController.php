<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function notes()
    {
        return view('consultant.notes');
    }
}
