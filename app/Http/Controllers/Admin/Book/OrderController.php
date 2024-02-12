<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\Book;
use App\Models\MandubBook;
use App\Models\OrderBookDetail;
use App\Models\OrderBookItem;
use App\Models\PackageBook;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function neworder()
    {
        $orders = OrderBookDetail::where('status', 'new')->get();
        return view('admin/book/orders/newOrder', compact('orders'));
    }
    public function deleteNewOrderDetails(int $order)
    {
        $order_one = OrderBookDetail::where('id', $order)->first();
        $order_one->delete();
        toastr()->success('تم حذف البيانات بنجاح');
        return back();
    }

    public function neworderDetails(int $id)
    {
        $order = OrderBookDetail::where('id', $id)->first();
        $order_items = OrderBookItem::where('order_id', $id)->get();
        return view('admin/book/orders/orderDetails', compact('order', 'order_items'));
    }
    //current //order
    public function currentorder()
    {
        $orders = OrderBookDetail::where('status', 'current')->get();
        return view('admin/book/orders/currentOrder', compact('orders'));
    }

    // public function deleteCurrentOrderDetails(int $orderId)
    // {
    //     // التحقق من وجود الطلب
    //     $currentOrder = OrderBookDetail::where('id', $orderId)->where('status', 'current')->first();

    //     if (!$currentOrder) {
    //         toastr()->error('الطلب غير موجود.');
    //         return back();
    //     }

    //     // استرجاع الكميات
    //     $items = OrderBookItem::where('order_id', $orderId)->get();

    //     foreach ($items as $item) {
    //         if ($item->book_id !== null) {
    //             $mandub = MandubBook::where('book_id', $item->book_id)->first();
    //             MandubBook::where('book_id', $item->book_id)
    //                 ->increment('mandub_quantity', $item->quantity);
    //             if ( $mandub->mandub_quantity < 0) {
    //                 MandubBook::where('book_id', $item->book_id)
    //                     ->decrement('station', $item->quantity);
    //             }
    //         } elseif ($item->package_id !== null) {
    //             $bookPackage = AnotherPackage::findOrFail($item->package_id);
    //             $books = PackageBook::where('package_id', $bookPackage->id)->get();
    //             foreach ($books as $book) {
    //                 $mandub = MandubBook::where('book_id', $book->book_id)->first();
    //                 MandubBook::where('book_id', $book->book_id)
    //                     ->increment('mandub_quantity', $item->quantity);
    //                 if ( $mandub->mandub_quantity < 0) {
    //                     MandubBook::where('book_id', $book->book_id)
    //                         ->decrement('station', $item->quantity);
    //                 }
    //             }
    //         }
    //     }
    //     $currentOrder->delete();

    //     toastr()->success('تم حذف البيانات بنجاح');

    //     return back();
    // }
    public function deleteCurrentOrderDetails(int $orderId)
{
    try {
        // التحقق من وجود الطلب
        $currentOrder = OrderBookDetail::where('id', $orderId)->where('status', 'current')->first();

        // استرجاع الكميات
        $items = OrderBookItem::where('order_id', $orderId)->get();

        foreach ($items as $item) {
            if ($item->book_id !== null) {
                MandubBook::where('book_id', $item->book_id)
                    ->update([
                        'mandub_quantity' => \DB::raw("mandub_quantity + $item->quantity"),
                        'station' => \DB::raw("CASE WHEN mandub_quantity < 0 THEN station - $item->quantity ELSE station END"),
                    ]);
            } elseif ($item->package_id !== null) {
                $bookPackage = AnotherPackage::findOrFail($item->package_id);
                $books = PackageBook::where('package_id', $bookPackage->id)->get();
                foreach ($books as $book) {
                    MandubBook::where('book_id', $book->book_id)
                        ->update([
                            'mandub_quantity' => \DB::raw("mandub_quantity + $item->quantity"),
                            'station' => \DB::raw("CASE WHEN mandub_quantity < 0 THEN station - $item->quantity ELSE station END"),
                        ]);
                }
            }
        }

        // حذف الطلب
        $currentOrder->delete();

        toastr()->success('تم حذف البيانات بنجاح');

        return back();
    } catch (\Exception $e) {
        toastr()->error('حدث خطأ أثناء حذف البيانات.');
        return back();
    }
}
//orderCompleted
public function orderCompleted()
{
    $orders = OrderBookDetail::where('status', 'complate')->get();
    return view('admin/book/orders/completed', compact('orders'));
}
//ended order
public function orderfinished()
{
    $orders = OrderBookDetail::where('status', 'finish')->get();
    return view('admin/book/orders/endedOrder', compact('orders'));
}

}
