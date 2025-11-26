<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AssociationController extends Controller
{
    public function associations()
    {
        return view('admin.associations.index', get_defined_vars());
    }
}
