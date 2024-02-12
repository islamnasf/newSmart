<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\Book;
use App\Models\BookCart;
use App\Models\City;
use App\Models\OrderBookDetail;
use App\Models\OrderBookItem;
use App\Models\Package;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        return view('landingpage/books/stages_notes');
    }
      public function primarySchool()
    {
        return view('landingpage.books.primary_school');
    }
    //second page
    public function highSchool()
    {
        return view('landingpage.books.high_school_notes');
    }
    //third page  
    public function middleSchool()
    {
        return view('landingpage.books.middle_school_notes');
    }
    public function classNotes(string $name)
    {
        $classroomMap = [
            'four' => 'الصف الرابع',
            'five' => 'الصف الخامس',
            'six' => 'الصف السادس',
            'seven' => 'الصف السابع',
            'eight' => 'الصف الثامن',
            'nine' => 'الصف التاسع',
            'ten' => 'الصف العاشر',
            'eleven' => 'الصف الحادي عشر',
            'twelve' => 'الصف الثاني عشر',
        ];

        if (isset($classroomMap[$name])) {
            $classroom = $classroomMap[$name];

            $books = Book::where('classroom', $classroom)->get();
            $book_Packages = AnotherPackage::has('book')->where('class', $classroom)->get();
            $course_Packages = Package::has('course')->where('class', $classroom)->get();

            $bookPackage = AnotherPackage::has('book')->where('class', $classroom)->first();
            $coursePackage = Package::has('course')->where('class', $classroom)->first();


            return view('landingpage.books.notes_class', compact('books', 'book_Packages', 'course_Packages', 'bookPackage', 'coursePackage'));
        }
    }

    //
   public function downloadPdf($fileName)
    {
        $filePath = storage_path('app/public/pdf/books/' . $fileName);
    
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else { 
            toastr()->error(' الملف غير موجود حالياً');
            return redirect()->back(); 
        }
    }
        //cart // 
    public function cartBooks()
    {

        $sessionId = session()->getId();
        $cities = City::all();
        $items = BookCart::where('session_id', $sessionId)->get();
        return view('landingpage.books.cart', compact('items', 'cities'));
    }

    //cart // book //add 
    public function addToCartbooks(Request $request)
    {
        BookCart::create([
            'session_id' => session()->getId(),
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        toastr()->success('تم اضافة الكتاب  بنجاح');
        return back();
    }
    public function addToCartPackages(Request $request)
    {
        BookCart::create([
            'session_id' => session()->getId(),
            'package_id' => $request->package_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        toastr()->success('تم اضافة الباقة  بنجاح');
        return back();
    }

    public function deleteCartBooksItem(int $cart)
    {
        $cartItem = BookCart::find($cart);
        $cartItem->delete();
        toastr()->success(' تم الحذف بنجاح');
        return redirect()->back();
    }
    
    //postnewquantitybook
    public function postnewquantitybook(Request $request, int $cart) {
        $cartItem = BookCart::find($cart);
        if ($cartItem) {
            $book = Book::find($cartItem->book_id);
            $package = AnotherPackage::find($cartItem->package_id);
            if ($book) {
                $cartItem->update([
                    'quantity' => $request->count,
                    'price' => $request->count * $book->book_price,
                ]);
            }
            if ($package) {
                $cartItem->update([
                    'quantity' => $request->count,
                    'price' => $request->count * $package->price,
                ]);
            }
        
        return response()->json(['success' => true, 'message' => 'تم تحديث الكمية بنجاح']);
    }

    return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء تحديث الكمية']);  
  }
  
    //order
    public function neworderbook(Request $request)
    {
        $sessionId = session()->getId();
        $items = BookCart::where('session_id', $sessionId)->get();
    
        if ($items->isNotEmpty()) {
            $price = 0;
    
            $newOrder = OrderBookDetail::create([
                'buyer' => $request->buyer,
                'phone' => $request->phone,
                'address' => $request->address,
                'city_id' => $request->city_id,
            ]);
    
            foreach ($items as $item) {
                $orderitem = OrderBookItem::create([
                    'session_id' => $sessionId,
                    'book_id' => $item->book_id,
                    'package_id' => $item->package_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'order_id' => $newOrder->id,
                ]);
    
                // if ($item->book_id) {
                //     $book = Book::find($item->book_id);
                //     if ($book) {
                //         $book->decrement('quantity', $item->quantity);
                //     }
                // }
                // if ($item->package_id) {
                //     $package = AnotherPackage::find($item->package_id);
                //     if ($package) {
                //         $package->book()->decrement('quantity', $item->quantity);
                //     }
                // }
                $price += $item->price;
            }
            $newOrder->update([
                'price_all' => $price,
            ]);
            BookCart::where('session_id', $sessionId)->delete();
            // إعرض رسالة الشكر بعد اتمام الطلب
            return view('landingpage/books/stages_notes', ['thankYou' => true]);
        }
    }
}
