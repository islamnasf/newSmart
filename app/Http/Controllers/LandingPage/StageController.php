<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Sitesetteings;
use App\Models\Tutorial;
use App\Models\Video;
use Illuminate\Http\Request;

class StageController extends Controller
{
//first page
    public function index()
    {
        $data = Sitesetteings::find(1);
        return view('landingpage/subject/stages', compact("data"));
    }
//second page
    public function stageInfon()
    {
        $data = Sitesetteings::find(1);
        return view('landingpage.subject.stageinfo', compact("data"));
    }
//third page  
  public function showAllSubjects(string  $name)
    {
        $data = Sitesetteings::find(1);
        
        if($name='six'){
            $coursesix=Course::where('classroom','الصف السادس')->get();
        }
        if($name='seven'){
            $courseseven=Course::where('classroom','الصف السابع')->get();
        }
        if($name='eight'){
            $courseeight=Course::where('classroom','الصف الثامن')->get();
        }
        if($name='nine'){
            $coursenine=Course::where('classroom','الصف التاسع')->get();
        }
        if($name='ten'){
            $courseten=Course::where('classroom','الصف العاشر')->get();
        }
        if($name='eleven'){
            $courseeleven=Course::where('classroom','الصف الحادي عشر')->get();
        }
        if($name='twelve'){
            $coursetwelve=Course::where('classroom','الصف الثاني عشر')->get();
        }

        return view('landingpage.subject.subjects', 
        compact("data","coursesix","courseseven","courseeight","coursenine","courseten","courseeleven","coursetwelve"));
    }

//fourth
public function showOneSubject(int $course)
{
    $data = Sitesetteings::find(1);
    $courses=Course::find($course);
    $tutorials=Tutorial::where('course_id',$course)->get();
    return view('landingpage.subject.subjectname', compact("data","tutorials","courses"));
}
public function showFreeVideo(int $video)
{
    $data = Sitesetteings::find(1);
    $video=Video::where('id',$video)->first();
    return view('landingpage.subject.freevideo', compact("data","video"));
}
public function download($pdf)
{
   return response()->download(storage_path('/app/public/pdfs/'.$pdf));
}

}
