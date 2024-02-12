<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tutorial;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return view("admin.course.home");
    }
    public function create()
    {
        $techer = User::where("user_type", "teacher")->get();
        return view("admin.course.add", compact("techer"));
    }
    public function store(Request $request)
    {
        $requests = $request->all();
        Course::create($requests);
        toastr()->success('تم حفظ البيانات بنجاح');
        return view("admin.course.home");
    }

    public function termone()
    {
        $courses = Course::where('term_type', 'termone')->get();
        $count = $courses->count();
        return view("admin.course.termone", compact("count", "courses"));
    }
    public function termtow()
    {
        $courses = Course::where('term_type', 'termtow')->get();
        $count = $courses->count();
        return view("admin.course.termtow", compact("count", "courses"));
    }

    public function showEdit(Request $request, $id)
    {
        $techer = User::where("user_type", "teacher")->get();
        $coures = Course::find($id);
        return view("admin.course.edit", compact("coures", 'techer'));
    }
    public function update(Request $request, $id)
    {
        $coures = Course::find($id);
        $coures->update($request->all());
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('course');
    }
    public function delete($courseId)
    {
        $courses = Course::find($courseId);
        $courses->delete();
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route("showTermone");
    }
    public function tutorial(Request $request, $courseId)
    {
        $course = Course::find($courseId);

        $tutorials = Tutorial::where('course_id', $courseId)->orderBy('order', 'desc')->get();
        return view('admin.course.tutorial', (compact('tutorials')))->with('course', $course);
    }
    public function updateTutorialOrder(Request $request)
    {
        if (Auth::user()->user_type != 'user') {
            // Update the order of tutorials in the database based on $order
            foreach ($request->input('order') as $index => $tutorialId) {
                Tutorial::whereId($tutorialId)->update(['order' => ++$index]);
            }

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function createTutorial(Request $request, $courseId)
    {
        $requests = $request->validate([
            'name' => 'required',
        ]);

        $tutorial = Tutorial::create([
            'name' => $request->name,
            'course_id' => $courseId,
        ]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function deleteTutorial(Request $request, $id)
    {
        $tutorial = Tutorial::find($id);
        $tutorial->delete();
        toastr()->success('تم حذف البيانات بنجاح');
        return back();
    }

    public function editTutorial(Request $request, $id)
    {
        $tutorial = Tutorial::find($id);
        $tutorial->update($request->all());
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }

    public function video(Request $request, $tutorialId)
    {
        $tutorial = Tutorial::find($tutorialId);

        $tutorial = $tutorial->video()->orderBy('order', 'asc')->get();

        // $tutorial = Tutorial::find($tutorialId)->video->orderBy('order', 'desc');
        $courses = User::find(Auth::user()->id)->course;
        return view('admin.course.video', (compact('tutorial', 'courses')));
    }
    public function updateVideoOrder(Request $request)
    {
        if (Auth::user()->user_type != 'user') {
            // Update the order of tutorials in the database based on $order
            foreach ($request->input('order') as $index => $video_id) {
                Video::whereId($video_id)->update(['order' => ++$index]);
            }

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function createVideo(Request $request, $tutorialId)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);
        $data = new video();
        if ($request->file('pdf')) {
            $file = $request->pdf;
            $filename = $file->getClientOriginalName();
            $request->pdf->storeAs('public/pdfs', $filename);
            $data->pdf = $filename;
        }
        $data->name = $request->name;
        $data->link = $request->link;
        $data->type = $request->type;
        $data->tutorial_id = $tutorialId;
        $data->save();
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }

    public function deleteVideo(Request $request, $id)
    {
        $video = Video::find($id);
        $video->delete();
        toastr()->success('تم حذف البيانات بنجاح');
        return back();
    }
    public function editVideo(Request $request, $id)
    {
        $data = Video::find($id);

        $request->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/pdfs', $filename);
            $data->pdf = $filename;
        }

        $data->name = $request->name;
        $data->link = $request->link;
        $data->type = $request->type;

        $data->save();

        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }


    public function reports()
    {
        $courses = UserCourse::join('users', 'user_courses.user_id', '=', 'users.id')
            ->select('user_courses.*', 'user_courses.price as user_price')
            ->get();
        $priceAll = $courses->sum('user_price');
        //
        $teachercourses = Course::with('techer')->join('user_courses', 'courses.id', '=', 'user_courses.course_id')
            ->select('user_courses.*', 'user_courses.price as teacher_price', DB::raw("DATE_FORMAT(user_courses.created_at, '%d/ %m/ 20%y') as date"), 'courses.*')
            ->get();
        //
        $price_all_teacher = 0;
        foreach ($teachercourses as $price) {
            $price_all_teacher += $price->techer->Teacher_ratio_course / 100 * $price->teacher_price;
        }

        $platformEarn = $priceAll - $price_all_teacher;
        return view('admin.course.reports', compact('priceAll', 'platformEarn', 'price_all_teacher', 'teachercourses'));
    }
    public function subscribesCourses()
    {
        $courses = UserCourse::join('users', 'user_courses.user_id', '=', 'users.id')
            ->select('user_courses.*', 'user_courses.price as user_price')
            ->get();
        $priceAll = $courses->sum('user_price');
        //
        $teachercourses = Course::with('techer')->join('user_courses', 'courses.id', '=', 'user_courses.course_id')
            ->select('user_courses.*', 'user_courses.price as teacher_price', DB::raw("DATE_FORMAT(user_courses.created_at, '%d/ %m/ 20%y') as date"), 'courses.*')
            ->get();
        //
        $price_all_teacher = 0;
        foreach ($teachercourses as $price) {
            $price_all_teacher += $price->techer->Teacher_ratio_course / 100 * $price->teacher_price;
        }

        $platformEarn = $priceAll - $price_all_teacher;
        return view('admin.course.subscribe', compact('priceAll', 'platformEarn', 'price_all_teacher', 'teachercourses'));
    }
}
