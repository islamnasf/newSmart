<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tutorial;
use App\Models\UserCourse;
use App\Models\Video;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $coursesix = Course::with('techer')->where('classroom', 'الصف السادس')->get();

        $courseseven = Course::with('techer')->where('classroom', 'الصف السابع')->get();
        $courseeight = Course::with('techer')->where('classroom', 'الصف الثامن')->get();
        $coursenine = Course::with('techer')->where('classroom', 'الصف التاسع')->get();
        $courseten = Course::with('techer')->where('classroom', 'الصف العاشر')->get();
        $courseeleven = Course::with('techer')->where('classroom', 'الصف الحادي عشر')->get();
        $coursetwelve = Course::with('techer')->where('classroom', 'الصف الثاني عشر')->get();
        return response()->json([
            'status' => 200,
            'coursesix' => $coursesix,
            'courseseven' => $courseseven,
            'courseeight' => $courseeight,
            'coursenine' => $coursenine,
            'courseten' => $courseten,
            'courseeleven' => $courseeleven,
            'coursetwelve' => $coursetwelve,
        ], 200);
    }
    public function tutorial(int $course)
    {
        $tutorial = Tutorial::where('course_id', $course)->with('video')->get();
        return response()->json([
            'status' => 200,
            'tutorial' => $tutorial,
        ], 200);
    }
    public function download($fileName)
    {
        return response()->download(storage_path('app/public/pdfs/' . $fileName));
    }

    public function userSubscription($user)
    {
        $userCourses = UserCourse::where('user_id', $user)->get();
        $courses = []; 
        foreach ($userCourses as $course) {
            $courseData = Course::where('id', $course->course_id)->with('techer')->first();
            if ($courseData) {
                $courses[] = $courseData; 
            }
        }
        return response()->json([
            'status' => 200,
            'Courses' => $courses,
        ], 200);
    }
}

