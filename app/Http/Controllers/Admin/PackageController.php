<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePackageRequest;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $query = Package::query();
        if (! empty(request('keyword'))) {
            $query = $query->where('name', request('keyword'));
        }
        if (! empty(request('order'))) {
            $query = $query->orderBy('id', request('order'));
        }
        $packages = $query->get();

        return view('admin.packages.index', get_defined_vars());
    }

    public function create()
    {
        return view('admin.packages.create', get_defined_vars());
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);

        return view('admin.packages.edit', get_defined_vars());
    }

    public function store(CreatePackageRequest $request)
    {
        Package::create($request->validated());

        return redirect()->route('admin.packages.index')->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function update(CreatePackageRequest $request, Package $package)
    {
        $package->update($request->validated());

        return redirect()->route('admin.packages.index')->with('success', 'تم تعديل الباقة بنجاح');
    }
}
