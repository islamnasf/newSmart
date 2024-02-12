<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id)->course;
        if ($user->count() == 0) {
           return redirect()->back()->with("error", "لست مشترك في اي مادة");
        }
        return view("student.subscription", compact("user"));

    }
}
