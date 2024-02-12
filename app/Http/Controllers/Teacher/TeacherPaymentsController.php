<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\Book;
use App\Models\Course;
use App\Models\PackageBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherPaymentsController extends Controller
{
    public function getPaymentHistoryTeacher()
    {
        return view('teacher.payment_history');
    }
    public function getCourseSubscription()
    {
        $authenticatedTeacher = Auth::user(); // Assuming your teacher model is used for authentication

        $teachercourses = Course::where('techer_id', $authenticatedTeacher->id)
            ->select('*')
            ->join('user_courses', 'courses.id', '=', 'user_courses.course_id')
            ->get();

        return view('teacher.subscription', compact('teachercourses'));
    }

    public function getBookEarnTeacher()
    {
        $authenticatedTeacher = Auth::user();
    
        $teacherbooks = Book::where('techer_id', $authenticatedTeacher->id)
            ->select('*')
            ->join('order_book_items', 'books.id', '=', 'order_book_items.book_id')
            ->join('order_book_details', 'order_book_items.order_id', '=', 'order_book_details.id')
            ->join('package_books', 'books.id', '=', 'package_books.book_id')
            ->where('order_book_details.status', 'finish')
            ->get();
    
        $packages = [];
    
        foreach ($teacherbooks as $item) {
            $packageId = $item->package_id;
    
            if ($packageId) {
                $package = AnotherPackage::find($packageId);
                if ($package) {
                    // التحقق من أن الكتب في الحزمة تعود لنفس المدرس
                    $booksInPackage = $package->book()->where('techer_id', $authenticatedTeacher->id)->get();

                    if ($booksInPackage->count() > 0) {
                        // أضف الحزمة إلى الجدول إذا كانت تحتوي على كتب للمدرس
                        $packages[] = $booksInPackage;
                    }
                }
            }
        }
    
        return view('teacher.books_earn', compact('teacherbooks', 'packages'));
    }
    
}
