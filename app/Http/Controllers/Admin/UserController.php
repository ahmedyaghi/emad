<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function users()
    {
        return view('admin.users.index', get_defined_vars());
    }
}
