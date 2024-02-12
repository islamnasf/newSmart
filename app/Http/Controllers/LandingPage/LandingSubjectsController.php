<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\Course;
use App\Models\Package;
use App\Models\Tutorial;
use App\Models\Video;
use Illuminate\Http\Request;

class LandingSubjectsController extends Controller
{
    public function index()
    {
        return view('landingpage/subject/stages');
    }
    //second page
    public function highSchool()
    {
        return view('landingpage.subject.high_school');
    }
    //third page  
    public function middleSchool()
    {
        return view('landingpage.subject.middle_school');
    }
    
    public function getCoursesClassRoom(string $name)
    {
        if ($name == 'four') {
            $courses = Course::where('classroom', 'الصف الرابع')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف الرابع')->get();
            $course_Packages = Package::has('course')->where('class', 'الصف الرابع')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف الرابع')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف الرابع')->first();
        } elseif ($name == 'five') {
            $courses = Course::where('classroom', 'الصف الخامس')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف الخامس')->get();
            $course_Packages = Package::has('course')->where('class', 'الصف الخامس')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف الخامس')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف الخامس')->first();
        } elseif ($name == 'six') {
            $courses = Course::where('classroom', 'الصف السادس')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف السادس')->get();
            $course_Packages = Package::has('course')->where('class', 'الصف السادس')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف السادس')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف السادس')->first();
        } elseif ($name == 'seven') {
            $courses = Course::where('classroom', 'الصف السابع')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف السابع')->get();
            $course_Packages = Package::has('course')->where('class',  'الصف السابع')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف السابع')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف السابع')->first();
        } elseif ($name == 'eight') {
            $courses = Course::where('classroom', 'الصف الثامن')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف الثامن')->get();
            $course_Packages = Package::has('course')->where('class', 'الصف الثامن')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف الثامن')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف الثامن')->first();
        } elseif ($name == 'nine') {
            $courses = Course::where('classroom', 'الصف التاسع')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف التاسع')->get();
            $course_Packages = Package::has('course')->where('class', 'الصف التاسع')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف التاسع')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف التاسع')->first();
        } elseif ($name == 'ten') {
            $courses = Course::where('classroom', 'الصف العاشر')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف العاشر')->get();
            $course_Packages = Package::has('course')->where('class', 'الصف العاشر')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف العاشر')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف العاشر')->first();
        } elseif ($name == 'eleven') {
            $courses = Course::where('classroom', 'الصف الحادي عشر')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف الحادي عشر')->get();
            $course_Packages = Package::has('course')->where('class',  'الصف الحادي عشر')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class',  'الصف الحادي عشر')->first();
            $coursePackage = Package::has('course')->where('class','الصف الحادي عشر')->first();
        } elseif ($name == 'twelve') {
            $courses = Course::where('classroom', 'الصف الثاني عشر')->get();
            $book_Packages = AnotherPackage::has('book')->where('class', 'الصف الثاني عشر')->get();
            $course_Packages = Package::has('course')->where('class', 'الصف الثاني عشر')->get();
            //
            $bookPackage = AnotherPackage::has('book')->where('class', 'الصف الثاني عشر')->first();
            $coursePackage = Package::has('course')->where('class', 'الصف الثاني عشر')->first();
        }
        return view('landingpage.subject.courses_class', compact('courses', 'book_Packages', 'course_Packages','bookPackage' ,'coursePackage'));
    }
    // public function getSubjectTutorialsAndFreeVideos(int $course){
    //       $courseDetails=Course::where('id',$course)->with('tutorial.video',function($query){
    //         $query->orderByRaw("FIELD(type, 'free') ASC");
    //     })->first();
    //     return view('landingpage.subject.allTutorialAndVideo',compact('courseDetails'));
    // }
    public function getSubjectTutorialsAndFreeVideos(int $course , int $video){
        $courseDetails=Course::where('id',$course)->first();
        $free_video=Video::where('id',$video)->first();
        $tutorials=Tutorial::where('course_id',$course)->get();
      return view('landingpage.subject.allTutorialAndVideo',compact('courseDetails','free_video','tutorials'));
  }

}
