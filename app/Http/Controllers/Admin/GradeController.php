<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
      public function index(){
        $grade=Grade::get();
        return view('/admin/grade', compact('grade'));
        }

         public function store(GradeRequest $request){
     
            $grade=Grade::create([
             'name'=>$request->name,
              'notes'=>$request->notes
            ]) ;
            if($grade){
            toastr()->success('تم حفظ البيانات بنجاح');
            return back(); 
            }else{
             toastr()->error('يوجد مشكل حاليا , حاول مره اخري ');
             return back();
            }
         }
         public function update(GradeRequest $request,int $gr)
         {
            $grade=Grade::findOrFail($gr)->update([
             'name'=>$request->name,
              'notes'=>$request->notes
            ]) ;
            if($grade){
            toastr()->success('تم تحديث البيانات بنجاح');
            return back(); 
        }else{
            toastr()->error('يوجد مشكل حاليا , حاول مره اخري ');
            return back();
           }
         }
     
        
         public function delete(Request $request ,int $gr){
     
             Grade::findOrFail($gr)->delete();
            
             toastr()->success('تم حذف البيانات ');
            return back();
     
         } 
}
