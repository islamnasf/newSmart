<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tutorial;
use App\Models\Video;
use App\Models\VideoComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller
{

    public function index($courseId)
    {
        $course = Course::find($courseId);
        $tutorials = Tutorial::where('course_id', $courseId)->get();
        return view("teacher.course.tutorial", compact("course", "tutorials"));
    }
    public function showVideo($videoId)
    {
        $comment = Video::find($videoId)->comments;
        $video = Video::find($videoId);
        $tutorial_id = Video::select("tutorial_id")->where('id', $videoId)->first();
        $course = Tutorial::select('course_id')->where('id', $tutorial_id->tutorial_id)->first();
        $tutorials = Tutorial::where('course_id', $course->course_id)->get();
        $courses = Course::where('id', $course->course_id)->first();

        return view("teacher.course.videolive", compact("comment", 'video', 'tutorials','courses'));
    }
    public function createVideoComment(Request $request, $videoId)
    {
        VideoComment::create([
            'comment' => $request->comment,
            'video_id' => $videoId,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with('success', 'Sent Comment');
    }
}
