<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\Book;
use App\Models\MandubBook;
use App\Models\Package;
use App\Models\PackageBook;
use App\Models\TargetBook;
use App\Models\TermOne;
use App\Models\TermTow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class BookController extends Controller
{
    public function index()
    {
        return view('/admin/book/home');
    }

    public function addBook()
    {
        $techer = User::where("user_type", "teacher")->get();
        return view('/admin/book/addBook', compact('techer'));
    }
    public function store(Request $request)
    {
        $data = new book();
        if ($request->file('pdf')) {
            $file = $request->pdf;
            $filename = $file->getClientOriginalName();
            $request->pdf->storeAs('public/pdf/books', $filename);
            $data->pdf = $filename;
        }
        $data->name = $request->name;
        $data->techer_id = $request->techer_id;
        $data->stage = $request->stage;
        $data->classroom = $request->classroom;
        // $data->expiry_date = $request->expiry_date;
        $data->quantity = $request->quantity;
        $data->teacher_ratio = floatval($request->teacher_ratio);
        $data->book_price = $request->book_price;
        $data->term_type = $request->term_type;
        $data->save();


        toastr()->success('تم حفظ البيانات بنجاح');
        return view("admin.book.home");
    }
    public function storeBook()
    {
        $books = book::with('target')->select('*')->get();
        return view('/admin/book/store', compact('books'));
    }
//
    public function showBooksClass(string $name)
    {
        if ($name == 'four') {
            $books = book::with('target')->where('classroom', 'الصف الرابع')->get();
        } elseif ($name == 'five') {
            $books = book::with('target')->where('classroom', 'الصف الخامس')->get();
        } elseif ($name == 'six') {
            $books = book::with('target')->where('classroom', 'الصف السادس')->get();
        } elseif ($name == 'seven') {
            $books = book::with('target')->where('classroom', 'الصف السابع')->get();
        } elseif ($name == 'eight') {
            $books = book::with('target')->where('classroom', 'الصف الثامن')->get();
        } elseif ($name == 'nine') {
            $books = book::with('target')->where('classroom', 'الصف التاسع')->get();
        } elseif ($name == 'ten') {
            $books = book::with('target')->where('classroom', 'الصف العاشر')->get();
        } elseif ($name == 'eleven') {
            $books = book::with('target')->where('classroom', 'الصف الحادي عشر')->get();
        } elseif ($name == 'twelve') {
            $books = book::with('target')->where('classroom', 'الصف الثاني عشر')->get();
        }
        return view('/admin/book/store', compact('books'));
    }

    public function addQuantity(request $request, int $book)
    {
        $book = Book::findOrFail($book);
        $oldQuantity = $book->quantity;
        $book->update([
            'quantity' => $oldQuantity + $request->quantity
        ]);
        // $books=Book::select('*')->get();
        // return view('/admin/book/store',compact('books') );
        return back();
    }
    public function termone()
    {
        $term = TermOne::first();
        $books = Book::where('term_type', 'termone')->get();
        return view("admin.book.termone", compact("books", "term"));
    }
    public function termtow()
    {
        $term = TermTow::first();
        $books = Book::where('term_type', 'termtow')->get();
        return view("admin.book.termtow", compact("books", "term"));
    }
    public function edit($book)
    {
        $book = Book::findOrfail($book);
        $techer = User::where("user_type", "teacher")->get();
        return view('/admin/book/editBook', compact(['techer', 'book']));
    }
    public function update(Request $request, $id)
    {
        $data = Book::findOrFail($id);
 
        if ($request->file('pdf')) {
            Storage::delete('public/pdf/books/' . $data->pdf);
            $file = $request->pdf;
            $filename = $file->getClientOriginalName();
            $request->pdf->storeAs('public/pdf/books', $filename);
            $data->pdf = $filename;
        }
        $data->name = $request->name;
        $data->techer_id = $request->techer_id;
        // $data->expiry_date = $request->expiry_date;
        $data->term_type = $request->term_type;
        $data->classroom = $request->classroom;
        $data->quantity = $request->quantity;
        $data->teacher_ratio = floatval($request->teacher_ratio);
        $data->book_price = $request->book_price;
        $data->save();
        toastr()->success('تم تحديث البيانات بنجاح');
        return $this->getTermPageRoute($data->term_type);
    }
    public function getTermPageRoute($termType)
    {
        $routeName = '';
        if ($termType == 'termone') {
            $routeName = 'termone';
        } elseif ($termType == 'termtow') {
            $routeName = 'termtow';
        } else {
            $routeName = 'default';
        }
        return redirect()->route($routeName);
    }
    //package
    public function allPackage()
    {
        $package = AnotherPackage::has('book')->where('is_active', 1)->get();
        return view("admin.book.package", compact("package"));
    }
    public function create(Request $request)
    {
        $package = AnotherPackage::create($request->all());

        if (!$package) {
            return redirect()->back()->with('error', 'حدثت مشكلة أثناء إنشاء الباقة');
        }

        $books = book::where('classroom', $package->class)->get();

        if ($books->isEmpty()) {
            return redirect()->back()->with('warning', 'لا توجد كتب متاحة لهذه الفئة.');
        }

        return view("admin.book.addpackage", compact('books', 'package'));
    }
    public function createPackageDetails(Request $request, int $package)
    {
        $request->validate([
            'selected_subjects' => 'required|array|min:1',
        ], [
            'selected_subjects.required' => 'يجب اختيار كورس واحد على الأقل.',
            'selected_subjects.min' => 'يجب اختيار كورس واحد على الأقل.',
        ]);
        $pack = AnotherPackage::find($package);
        if (!$pack) {
            return redirect()->back()->with('error', 'لم يتم العثور على الباقة');
        }
        $selectedBooks = $request->input('selected_subjects', []);
        $data = [
            'created_at' => Carbon::now(),
        ];
        $pack->book()->sync($selectedBooks, $data);
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('getPackage');
    }
    public function archivePackage($id)
    {
        $package = AnotherPackage::find($id);
        if ($package) {
            $package->update(['is_active' => 0]);
            return redirect()->back()->with('success', 'تم تحديث حالة الأرشيف بنجاح.');
        } else {
            return redirect()->back()->with('error', 'العنصر غير موجود.');
        }
    }
    public function unarchivePackage($id)
    {
        $package = AnotherPackage::find($id);
        if ($package) {
            $package->update(['is_active' => 1]);
            return redirect()->back()->with('success', 'تم تحديث حالة الأرشيف بنجاح.');
        } else {
            return redirect()->back()->with('error', 'العنصر غير موجود.');
        }
    }
    public function editPackage(Request $request, $packageId)
    {
        $package = AnotherPackage::find($packageId);
    
        if (!$package) {
            toastr()->error('الصف لا يحتوي على مذكرات');
            return redirect()->route('showPackage');
        }
    
        $books = Book::where('classroom', $package->class)->get();
        $packagebooks = PackageBook::where("package_id", $package->id)->get();
    
        if ($packagebooks->isEmpty()) {
            toastr()->error('الباقة لا تحتوي على مذكرات');
            return redirect()->route('showPackage');
        }
    
        $selectedBooks = [];
    
        foreach ($packagebooks as $packagebookItem) {
            $book = Book::find($packagebookItem->book_id);
    
            if ($book) {
                $selectedBooks[] = $book;
            }
        }
    
        return view("admin.book.addpackage", compact(['books', 'package', 'selectedBooks']));
    }
    
    

    public function unActive()
    {
        $package = AnotherPackage::where('is_active', 0)->get();
        return view("admin.book.packageArchive", compact("package"));
    }
    public function delete($packageId)
    {
        $package = AnotherPackage::find($packageId);
        $package->delete();
        return redirect()->back()->with("success", "تم الحذف بنجاح");
    }
    ////end package book
//target
    public function createTarget(Request $request)
    {
        $selectedBooks = $request->input('selected_subjects');
        if (!$selectedBooks) {
            toastr()->error('لا يوجد مذكرات');
            return back();
        }
        $target = $request->input('target');
        foreach ($selectedBooks as $bookId) {
            $book = Book::find($bookId);
            if ($book) {
                $printValue = $target - $book->quantity;

                TargetBook::updateOrCreate(
                    ['book_id' => $bookId],
                    [
                        'target' => $target,
                        'print' => $printValue,
                    ]
                );
            }
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function updateQuantityClass(Request $request)
    {
        $selectedBooks = $request->input('selected_subjects');
        if (!$selectedBooks) {
            toastr()->error('لا يوجد مذكرات');
            return back();
        }
        $quantity = $request->input('quantity');
        foreach ($selectedBooks as $bookId) {
            $book = Book::find($bookId);
            if ($book) {
                $newquantity = $quantity + $book->quantity;

                $book->update(
                    [
                        'quantity' => $newquantity,
                    ]
                );
            }
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function finishPrint(Request $request)
    {
        $selectedBooks = $request->input('selected_subjects');
        if (!$selectedBooks) {
            toastr()->error('لا يوجد مذكرات');
            return back();
        }
        foreach ($selectedBooks as $bookId) {
            $book = Book::find($bookId);
            if ($book) {
                $newquantity = $book->target->print + $book->quantity;
                TargetBook::where('book_id', $bookId)->first()->update(['print' =>$book->target->target-$newquantity ]);

                $book->update(
                    [
                        'quantity' => $newquantity,
                    ]
                );
            }
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }

    public function printBookFinish($book)
    {
        $book = Book::where('id', $book)->first();

        if ($book) {
            $newquantity = $book->target->print + $book->quantity;
            TargetBook::where('book_id', $book->id)->first()->update(['print' => 0]);

            $book->update([
                'quantity' => $newquantity,
            ]);
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }

public function deleteBookFromStore(int $book)
{
    try {
        $bookModel = Book::findOrFail($book);
        
        // Attempt to delete the book
        $bookModel->delete();

        toastr()->success('تم حذف البيانات');
    } catch (QueryException $e) {
        // Check if the exception is due to a foreign key constraint violation
        if ($e->errorInfo[1] === 1451) {
            toastr()->error('لا يمكن حذف الكتاب لأنه مرتبط بسجلات في جدول آخر.');
        } else {
            // Handle other database-related exceptions
            toastr()->error('حدث خطأ أثناء محاولة حذف البيانات.');
        }
    }
    return back();
}

public function deleteQuantityBookFromStore(){
    $b=Book::all();
    foreach($b as $item){
        $item->update([
            'quantity'=> 0
        ]);
    }
    $books = book::with('target')->select('*')->get();
    return view('/admin/book/store', compact('books'));
}

public function updatePrintQuantity(Request $request, $book)
{
    try {
        $printQuantity = $request->print_quantity;

        // التأكد من أن الكتاب المستهدف موجود
        $book = TargetBook::where('book_id', $book)->first();

        if (!$book) {
            return response()->json(['message' => 'الكتاب غير موجود.'], 404);
        }

        // التحقق من أن قيمة كمية الطباعة المحددة أقل من أو تساوي target
        if ($printQuantity <= $book->target) {
            // قم بتحديث قاعدة البيانات فقط إذا كانت القيمة المحددة تلبي الشرط
            $book->update(['print' => $printQuantity]);
            return response()->json(['message' => 'تم تحديث كمية الطباعة بنجاح.']);
        } else {
            return response()->json(['message' => 'قيمة كمية الطباعة يجب أن تكون أقل من أو تساوي ' . $book->target], 400);
        }
    } catch (\Exception $e) {
        return response()->json(['message' => 'حدث خطأ أثناء تحديث كمية الطباعة.'], 500);
    }
}




}