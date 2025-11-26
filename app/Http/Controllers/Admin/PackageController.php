<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function packages()
    {
        return view('admin.packages.index', get_defined_vars());
    }
}
