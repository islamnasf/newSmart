<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Flasher\Laravel\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::get();
        return view('/admin/exam', compact('exams'));
    }

    public function selectTerm()
    {
        return view('examAndbank.selectTerm');
    }
    public function selectType()
    {
        return view('examAndbank.selectType');
    }

    public function store(Request $request)
    {
        //////////////////
        $data = new Exam();
        if ($request->file('unsolved_test') == null && $request->file('previous_test') == null && $request->file('solved_test') == null && $request->file('book_test') == null) {

            toastr()->error(' يجب اضافة امتحان علي الاقل  , حاول مره اخري ');
            return back();
        }
        if ($request->subject == null || $request->grade == null || $request->group == null || $request->season == null) {

            toastr()->error(' يوجد خطأ  , حاول مره اخري ');
            return back();
        }
        if ($request->file('previous_test') == null) {
            $file1 = "";
        } else {
            $file1 = $request->previous_test;
            $filename1 = $file1->getClientOriginalName();
            $request->previous_test->storeAs('public/pdf', $filename1);
            $data->previous_test = $filename1;
        }

        if ($request->file('book_test') == null) {
            $file2 = "";
        } else {
            $file2 = $request->book_test;
            $filename2 = $file2->getClientOriginalName();
            $request->book_test->storeAs('public/pdf', $filename2);
            $data->book_test = $filename2;
        }

        if ($request->file('solved_test') == null) {
            $file3 = "";
        } else {
            $file3 = $request->solved_test;
            $filename3 = $file3->getClientOriginalName();
            $request->solved_test->storeAs('public/pdf', $filename3);
            $data->solved_test = $filename3;
        }

        if ($request->file('unsolved_test') == null) {
            $file4 = "";
        } else {
            $file4 = $request->unsolved_test;
            $filename4 = $file4->getClientOriginalName();
            $request->unsolved_test->storeAs('public/pdf', $filename4);
            $data->unsolved_test = $filename4;
        }
        $data->subject = $request->subject;
        $data->grade = $request->grade;
        $data->group = $request->group;
        $data->season = $request->season;
        $data->save();
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function download($fileName)
    {

        return response()->download(storage_path('app/public/pdf/' . $fileName));
    }
    //////       
    public function update(Request $request)
    {
        $exam_id = $request->id;
        $old_pdf1 = $request->old_pdf1;
        $old_pdf2 = $request->old_pdf2;
        $old_pdf3 = $request->old_pdf3;
        $old_pdf4 = $request->old_pdf4;
        Exam::findOrFail($exam_id)->update([
            'subject' => $request->subject,
            'previous_test' => $old_pdf1,
            'book_test' => $old_pdf2,
            'solved_test' => $old_pdf3,
            'unsolved_test' => $old_pdf4,
        ]);
        if ($request->file('previous_test')) {
            $previous_test = $request->previous_test;
            $filename1 = $previous_test->getClientOriginalName();
            $request->solved_test->storeAs('public/pdf', $filename1);
            Exam::findOrFail($exam_id)->update([
                'previous_test' => $filename1,
            ]);
        }
        if ($request->file('book_test')) {
            $book_test = $request->book_test;
            $filename2 = $book_test->getClientOriginalName();
            $request->book_test->storeAs('public/pdf', $filename2);
            Exam::findOrFail($exam_id)->update([
                'book_test' => $filename2,
            ]);
        }
        if ($request->file('solved_test')) {
            $solved_test = $request->solved_test;
            $filename3 = $solved_test->getClientOriginalName();
            $request->solved_test->storeAs('public/pdf', $filename3);
            Exam::findOrFail($exam_id)->update([
                'solved_test' => $filename3,
            ]);
        }
        if ($request->file('unsolved_test')) {
            $unsolved_test = $request->unsolved_test;
            $filename4 = $unsolved_test->getClientOriginalName();
            $request->unsolved_test->storeAs('public/pdf', $filename4);
            Exam::findOrFail($exam_id)->update([
                'unsolved_test' => $filename3,
            ]);
        }

        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function delete(Request $request)
    {
        $exam = Exam::findOrFail($request->id);
        $pdf1 = $exam->previous_test;
        $pdf2 = $exam->book_test;
        $pdf3 = $exam->solved_test;
        $pdf4 = $exam->unsolved_test;

        // Delete each file if it exists
        if ($pdf1 && file_exists($pdf1)) {
            unlink($pdf1);
        }

        if ($pdf2 && file_exists($pdf2)) {
            unlink($pdf2);
        }

        if ($pdf3 && file_exists($pdf3)) {
            unlink($pdf3);
        }

        if ($pdf4 && file_exists($pdf4)) {
            unlink($pdf4);
        }

        // Delete the Exam record
        $exam->delete();

        toastr()->success('تم حذف البيانات بنجاح');
        return back();
    }

}
