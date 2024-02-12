<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\CartItem;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Package;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teacherCount = user::where('user_type', 'teacher')->count();
        $studentCount = user::where('user_type', 'user')->count();
        //admin
        $courses = Course::all()->count();
        $examCount = Exam::count();
        //student
        $cart = CartItem::where("user_id", Auth::user()->id)->get();
        $countCart = $cart->count();
        $sumPrice = $cart->sum("price");
        $subs = User::find(auth()->user()->id)->course;
        $paks = User::find(auth()->user()->id)->package;
        $subject = Auth::user()->group;
        $userSubject = Course::where('classroom', $subject)->get();
        $userPackage = Package::has('course')->where('class', $subject)->get();
        $PackageCourse = Package::has('course')->where('class', $subject)->first();
        $PackageBook = AnotherPackage::has('book')->where('class', $subject)->first();
        //
        return view('/admin/dashboard', compact('teacherCount', 'studentCount', 'examCount', 'courses', 'userSubject', 'cart', 'countCart', 'subs','paks','userPackage' ,'sumPrice' ,'PackageCourse','PackageBook'));
    }
}
