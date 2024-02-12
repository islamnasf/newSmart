<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        $count = Contact::count();
        return view("admin.contact", compact("count"))->with("contacts", $contacts);
    }
    public function delete($id)
    {
        $contacts = Contact::find($id);
        $contacts->delete();
        toastr()->success('تم حذف السؤال بنجاح');
        return redirect()->route('getContact');
    }
}
