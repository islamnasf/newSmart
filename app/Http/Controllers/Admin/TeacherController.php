<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers=user::where('user_type','teacher')->get();
        $count=user::where('user_type','teacher')->count();
        return view('/admin/teacher', compact('teachers','count'));
        }
    public function store(Request $request)
    {
        $rules=[
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'unique:'.User::class ,'digits:8'],
            'password' => ['required'],
            'Teacher_ratio_course' => ['required'],
            'teacher_description' => ['required'],
        ];
        $customMessages = [
            'name.required' => 'يجب ادخال الاسم   ',
            'phone.required' => 'يجب ادخال رقم الهاتف    ',
            'password.required' => 'يجب ادخال كلمة السر      ',
            'phone.unique' => 'هذا الفون موجود مسبقا',
            'phone.digits' => 'رقم الهاتف  يجب ان يكون 8 ارقام فقط   ',      
            'Teacher_ratio_course.required'=>'يجب ادخال النسبة للمدرس',
            'teacher_description.required'=>'يجب ادخال وصف للمدرس ',
            
        ];
        $request->validate($rules, $customMessages);
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' =>$request->password,
            'user_password' =>$request->password,
            'Teacher_ratio_course'=>$request->Teacher_ratio_course,
            'teacher_description'=>$request->teacher_description,


        ]);
        if($user){
            $user->update([
                'user_type' =>'teacher',
            ]);
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function update(Request $request ,int $teacher)
    {
        $rules=[
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required','digits:8'],
            'password' => ['required'],
            'Teacher_ratio_course' => ['required'],
            'teacher_description' => ['required'],

        ];
        $customMessages = [
            'name.required' => 'يجب ادخال الاسم ',
            'phone.required' => 'يجب ادخال رقم الهاتف ',
            'password.required' => 'يجب ادخال كلمة السر ',
            'phone.unique' => 'هذا الفون موجود مسبقا',
            'phone.digits' => 'رقم الهاتف  يجب ان يكون 8 ارقام فقط   ',   
            'Teacher_ratio_course.required'=>'يجب ادخال النسبة للمدرس',     
            'teacher_description.required'=>'يجب ادخال وصف للمدرس ',
          ];
        $request->validate($rules, $customMessages);
        User::findOrFail($teacher)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' =>$request->password,
            'user_password' =>$request->password,
            'Teacher_ratio_course'=>$request->Teacher_ratio_course,
            'teacher_description'=>$request->teacher_description,
        ]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
}
