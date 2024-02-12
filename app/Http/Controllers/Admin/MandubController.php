<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\MandubBook;
use App\Models\OrderBookDetail;
use App\Models\TargetBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandubController extends Controller
{
    public function index()
    {
        $mandubs = user::where('user_type', 'mandub')->get();
        $count = user::where('user_type', 'mandub')->count();
        return view('/admin/book/mandub', compact('mandubs', 'count'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'unique:' . User::class, 'digits:8'],
            'password' => ['required'],
        ];
        $customMessages = [
            'name.required' => 'يجب ادخال الاسم   ',
            'phone.required' => 'يجب ادخال رقم الهاتف    ',
            'password.required' => 'يجب ادخال كلمة السر      ',
            'phone.unique' => 'هذا الفون موجود مسبقا',
            'phone.digits' => 'رقم الهاتف  يجب ان يكون 8 ارقام فقط   ',
        ];
        $request->validate($rules, $customMessages);
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => $request->password,
            'user_password' => $request->password,
        ]);
        if ($user) {
            $user->update([
                'user_type' => 'mandub',
            ]);
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }

    public function update(Request $request, int $mandub)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits:8'],
            'password' => ['required'],
        ];
        $customMessages = [
            'name.required' => 'يجب ادخال الاسم   ',
            'phone.required' => 'يجب ادخال رقم الهاتف    ',
            'password.required' => 'يجب ادخال كلمة السر      ',
            'phone.unique' => 'هذا الفون موجود مسبقا',
            'phone.digits' => 'رقم الهاتف  يجب ان يكون 8 ارقام فقط   ',
        ];

        $request->validate($rules, $customMessages);
        User::findOrFail($mandub)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => $request->password,
            'user_password' => $request->password,
        ]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function mandubStorage(int $mandub)
    {
        $mandub = user::where('id', $mandub)->first();
        $books = Book::all();

        return view('/admin/book/mandubStorage', compact('mandub', 'books'));
    }
    public function showBooksClass(string $name, $mandub)
    {
        if ($name == 'four') {
            $books = book::with('target')->where('classroom', 'الصف الرابع')->get();
        } elseif ($name == 'five') {
            $books = book::with('target')->where('classroom', 'الصف الخامس')->get();
        } elseif ($name == 'seven') {
            $books = book::with('target')->where('classroom', 'الصف السابع')->get();
        }
        if ($name == 'six') {
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
        $mandub = user::where('id', $mandub)->first();
        return view('/admin/book/mandubStorage', compact('mandub', 'books'));
    }
    public function addMinimum(Request $request, int $mandub, int $book)
    {
        if (!is_numeric($mandub) || !is_numeric($book)) {
            return back()->with('error', 'Invalid values for mandub or book.');
        }
        $requestData = request()->all();
        if (empty($requestData['minimum'])) {
            return back()->with('error', 'Minimum value is required.');
        }
        MandubBook::updateOrCreate(
            ['book_id' => $book, 'mandub_id' => $mandub],
            ['minimum' => $requestData['minimum']]
        );
        return back()->with('success', 'تمت العملية بنجاح.');
    }
    public function addMandubQuantity(Request $request, int $mandubId, int $bookId)
    {
        $book = Book::findOrFail($bookId);
        $mandub = User::findOrFail($mandubId);
        $oldQuantity = $book->quantity;

        $mandub_book = MandubBook::where('book_id', $bookId)
            ->where('mandub_id', $mandubId)
            ->first();

        $book->update([
            'quantity' => $oldQuantity - $request->station
        ]);

        if (!$mandub_book) {
            MandubBook::create([
                'book_id' => $bookId,
                'mandub_id' => $mandubId,
                'distributor_active' => 0,
                'mandub_active' => 0
            ]);
        } else {
            $mandub_book->update([
                'station' => $mandub_book->station + $request->station,
                'distributor_active' => 0,
                'mandub_active' => 0
            ]);
        }

        return back()->with('success', 'تمت العملية بنجاح.');
    }
    //
    public function updateDistributorActive(int $bookId, int $mandubId)
    {
        $book = Book::findOrFail($bookId);
        $mandub = User::findOrFail($mandubId);
        $mandub_book = MandubBook::where('book_id', $bookId)
            ->where('mandub_id', $mandubId)
            ->first();
        $mandub_book->update([
            'distributor_active' => 1,
        ]);
        return back()->with('success', 'تمت العملية بنجاح.');
    }
    public function updateMandubActive(int $bookId, int $mandubId)
    {
        $book = Book::findOrFail($bookId);
        $mandub = User::findOrFail($mandubId);
        $mandub_book = MandubBook::where('book_id', $bookId)
            ->where('mandub_id', $mandubId)
            ->first();

        $mandub_book->update([
            'distributor_active' => 1,
            'mandub_active' => 1,
            'mandub_quantity' => $mandub_book->mandub_quantity + $mandub_book->station,
            'station' => 0,

        ]);
        return back()->with('success', 'تمت العملية بنجاح.');
    }
    //postStation
    public function createStation(Request $request, int $mandubId)
    {
        $mandub = User::findOrFail($mandubId);
    
        $selectedBooks = $request->input('selected_subjects');
        if (!$selectedBooks) {
            toastr()->error('لا يوجد مذكرات');
            return back();
        }
        $mandub_target = $request->mandub_target;
    
        foreach ($selectedBooks as $bookId) {
            $mandubBook = $mandub->mandubBooks()->where('book_id', $bookId)->first();
            $book = Book::findOrFail($bookId);
            $targetValue = ($mandub_target ?? 0);
            $stationValue = $targetValue - ($mandubBook->pivot->mandub_quantity ?? 0);
    
            MandubBook::updateOrCreate(
                ['book_id' => $bookId, 'mandub_id' => $mandubId],
                [
                    'station' => $stationValue,
                    'mandub_target' => $targetValue,
                    'distributor_active' => 0,
                    'mandub_active' => 0,
                ]
            );
    
            $newQuantityData = $book->quantity - $stationValue;
    
            if ($newQuantityData > 0) {
                $book->update([
                    'quantity' => $newQuantityData
                ]);
            } elseif ($newQuantityData <= 0) {
                $book_target = TargetBook::where('book_id', $book->id)->first();
    
                if ($book_target) {
                    $book_target->update([
                        'print' =>  - $book->quantity  + $stationValue ,
                        'target' =>  - $book->quantity + $stationValue ,
                    ]);
                } else {
                    TargetBook::create([
                        'book_id' => $book->id,
                        'print' => -$book->quantity + $stationValue ,
                        'target' => -$book->quantity + $stationValue ,
                    ]);
                }
    
                $book->update([
                    'quantity' => 0
                ]);
            }
        }
    
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function finishStation(Request $request)
    {
        $selectedBooks = $request->input('selected_subjects');
        if (!$selectedBooks) {
            toastr()->error('لا يوجد مذكرات');
            return back();
        }
        foreach ($selectedBooks as $bookId) {
            $book = MandubBook::where('book_id', $bookId)->first();
            if (!$book) {
                toastr()->success(' يجب اضافة مستهدف لجميع الكتب المحدده');
                return back();
            }
            $newquantity = $book->station + $book->mandub_quantity;
            $station = max(0, $book->mandub_target - $newquantity);
    
            MandubBook::where('book_id', $bookId)->update([
                'mandub_quantity' => $newquantity,
                'station' => $station,
            ]);
            if ($station == 0) {
                MandubBook::where('book_id', $bookId)->update([
                    'mandub_active' => 1,
                    'distributor_active' => 1,
                ]);
            }
        }
        toastr()->success('تم حفظ البيانات بنجاح');
        return back();
    }
    public function updateStationQuantity(Request $request, $book, $mandub)
    {
        try {
            $stationQuantity = $request->station_quantity;
            $book = MandubBook::where('book_id', $book)->where('mandub_id',$mandub)->first();    
            if (!$book) {
                return response()->json(['message' => 'الكتاب غير موجود.'], 404);
            }
            if($stationQuantity <= $book->mandub_target) {
                $book->update(['station' => $stationQuantity]);
                return response()->json(['message' => 'تم تحديث كميةالتوريد بنجاح.']);
            }else {
                toastr()->error( 'قيمة كمية التوريد يجب أن تكون أقل من أو تساوي  المستهدف في احدي الكتب ]');
                return back();
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'حدث خطأ أثناء تحديث كمية التوريد.'], 500);
        }
    }
    //ordercomplete//
    public function mandubOrderComplete($mandubId)
    {
        $orders = OrderBookDetail::where('status','complate')->where('mandub_id', $mandubId)->get();
        $mandubData = User::find($mandubId);
        return view('admin.book.mandubOrderComplete', compact('orders', 'mandubData'));
    }
    //endedAllOrderCompleteForMandub
    public function endedAllOrderCompleteForMandub($mandubId)
    {
        $orders = OrderBookDetail::where('status','complate')->where('mandub_id', $mandubId)->get();
       if($orders->count() == 0){
        toastr()->error( '   لا يوجد طلبات مكتملة حاليا ');
        return back();
       }else{
        foreach($orders as $order){
            $order->update([
                'status'=>'finish'
            ]);
        }
    }
        toastr()->success( ' تم تحصيل جميع الطلبات للمندوب');
        return back();    
    }

}
