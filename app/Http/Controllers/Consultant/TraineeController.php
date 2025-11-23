<?php

namespace App\Http\Controllers\Consultant;

use App\Http\Controllers\Controller;

class TraineeController extends Controller
{
    public function trainees()
    {
        return view('consultant.trainees');
    }
}
