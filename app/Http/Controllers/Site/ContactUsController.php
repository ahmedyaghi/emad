<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactUsRequest;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function contact_us()
    {
        return view('site.contact_us');
    }

    public function handle_contact_us(ContactUsRequest $request)
    {
        ContactUs::create($request->validated());
        return redirect()->route('main');
    }
}
