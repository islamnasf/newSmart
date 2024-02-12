<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{    
    public function index(){
        $group=Group::with('grades')->get();
        $grades=Grade::with('groups')->get();
        return view('/admin/group', compact(['group','grades']));
        }

         public function store(Request $request  ){
            // $gr=Grade::where('id',$request->grade_id)->first();
            $group=Group::create([
             'group_name'=>$request->group_name,
              'details'=>$request->details,
              'grade_id'=>$request->grade_id,
            ]);
            if($group){
            toastr()->success('تم حفظ البيانات بنجاح');
            return back(); 
            }else{
             toastr()->error('يوجد مشكل حاليا , حاول مره اخري ');
             return back();
            }
         }
         public function update(Request $request,int $gr,int $grade)
         {
            $group=Group::findOrFail($gr)->update([
             'group_name'=>$request->group_name,
             'details'=>$request->details,
             'grade_id'=>$grade

            ]) ;
            if($group){
            toastr()->success('تم تحديث البيانات بنجاح');
            return back(); 
        }else{
            toastr()->error('يوجد مشكل حاليا , حاول مره اخري ');
            return back();
           }
         }
     
        
         public function delete(Request $request ,int $gr){
     
             Group::findOrFail($gr)->delete();
            
             toastr()->success('تم حذف البيانات ');
            return back();
         }
   
}
