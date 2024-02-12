<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
class ContactUs extends Controller
{
    public function index()
    {
        return view("landingpage.contact");
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        Contact::create($request->all());
        toastr()->success('تم  الارسال بنجاح');
        return back();
    }
}
