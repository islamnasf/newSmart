<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermOne;
use App\Models\TermTow;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function createTermOne(Request $request)
    {           
        $term = TermOne::first();
    
        if ($term) {
            $term->update([
                'start' => $request->start,
                'end' => $request->end,
            ]);
        } else {
            TermOne::create([
                'start' => $request->start,
                'end' => $request->end,
            ]);
        }
    
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function createTermTow(Request $request)
{           
    $term = TermTow::first();

    if ($term) {
        $term->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);
    } else {
        TermTow::create([
            'start' => $request->start,
            'end' => $request->end,
        ]);
    }

    toastr()->success('تم حفظ البيانات بنجاح');
    return back();
}

    
}
