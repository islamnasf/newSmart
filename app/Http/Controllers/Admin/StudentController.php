<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    public function index()
    {
        $students = User::select('*', DB::raw("DATE_FORMAT(created_at, '%d/ %m/ 20%y') as date"))->where('user_type', 'user')->get();
        $studentCount = User::where('user_type', 'user')->count();
        $totalSub = DB::table('user_courses')
            ->select(DB::raw('COUNT(DISTINCT user_id) as total_unique_users_count'))
            ->value('total_unique_users_count'); // استخدم value() بدلاً من first()
    
        return view('admin.student', compact(['students', 'studentCount','totalSub']));
    }
    
    public function update(StudentEditRequest $request, int $student)
    {

        User::findOrFail($student)->update([
            'name' => $request->name,
            'password' => $request->password,
            'phone' => $request->phone,
            'user_password' => $request->password,
        ]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function updateGroup(Request $request, int $student)
    {
        $rules = [
            'grade' => ['required'],
            'group' => ['required'],
        ];
        $customMessages = [
            'grade.required' => 'مطلوب اسم المرحلة ',
            'group.required' => 'مطلوب اسم الصف ',
        ];

        $request->validate($rules, $customMessages);
        User::findOrFail($student)->update([
            'grade' => $request->grade,
            'group' => $request->group,
        ]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function deleteStudentNotSub(int $student){
        $studentData=User::where('id',$student)->first();
        $studentData->delete();
        toastr()->success('تم حذف الطالب بنجاح');
        return back();
    }
}
