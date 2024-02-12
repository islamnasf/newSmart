<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SubjectController extends Controller
{
    public function index(){
        $teacher_id=Auth::user()->id;
        $courses=Course::where('techer_id',$teacher_id)->get();
        return view('/teacher/course', compact('courses'));
    }
}
