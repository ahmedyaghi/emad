<?php

namespace App\Http\Controllers\Association;

use App\Http\Controllers\Controller;

class TraineeController extends Controller
{
    public function index()
    {
        return view('association.trainees.index');
    }
}
