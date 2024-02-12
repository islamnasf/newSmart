<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnotherPackage;
use App\Models\Book;
use App\Models\BookCart;
use App\Models\City;
use App\Models\MandubBook;
use App\Models\MandubCity;
use App\Models\OrderBookDetail;
use App\Models\OrderBookItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MandubAppController extends Controller
{
    public function index($mandub)
    {
        $mandubCities = MandubCity::where('mandoub_id', $mandub)->get();

        if ($mandubCities->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No MandubCity found for the given mandoub.',
            ], 404);
        }

        $cityIds = $mandubCities->pluck('city_id');
        $cities = City::whereIn('id', $cityIds)->get();
        $orders = [];

        foreach ($cities as $city) {
            $cityOrders = OrderBookDetail::where('city_id', $city->id)->where('status', 'new')->get()->toArray();
            $orders = array_merge($orders, $cityOrders);
        }

        return response()->json([
            'status' => 200,
            'cities' => $cities,
            'orders' => $orders,
        ], 200);
    }


    public function orderDetails($order)
    {
        $orderdetails = OrderBookItem::where('order_id', $order)
            ->where(function ($query) {
                $query->has('package')->orWhereHas('book');
            })->with('package')->with('book')
            ->get();
        return response()->json([
            'status' => 200,
            'orderdetails' => $orderdetails,
        ], 200);
    }

    public function packageDetails($package)
    {
        $packagedetails = AnotherPackage::where('id', $package)->with('book')->get();
        return response()->json([
            'status' => 200,
            'packagedetails' => $packagedetails,
        ], 200);
    }
    public function changeOrderTocurrent($order, $mandub)
    {
        $neworder = OrderBookDetail::where('id', $order)->first();
        $neworder->update([
            'status' => 'current',
            'mandub_id' => $mandub
        ]);
        return response()->json([
            'status' => 200,
            'order' => $neworder,
        ], 200);
    }
    public function currentOrders($mandub)
    {
        $currentorder = OrderBookDetail::where('mandub_id', $mandub)->where('status', 'current')->get();
        return response()->json([
            'status' => 200,
            'orders' => $currentorder,
        ], 200);
    }

    public function changeOrderTocomplate($order)
    {
        $currentorder = OrderBookDetail::where('id', $order)->first();
        $currentorder->update([
            'status' => 'complate'
        ]);
        return response()->json([
            'status' => 200,
            'order' => $currentorder,
        ], 200);
    }
    public function complateOrders($mandub)
    {
        $complateorder = OrderBookDetail::where('mandub_id', $mandub)->where('status', 'complate')->get();
        return response()->json([
            'status' => 200,
            'orders' => $complateorder,
        ], 200);
    }
    public function mandubBooks($mandub)
    {
        $mandubStore = User::where('id', $mandub)->with('mandubBooks')->get();
        return response()->json([
            'status' => 200,
            'namdubStore' => $mandubStore,
        ], 200);
    }
    public function booksandpackagesClasses()
    {
        $books = Book::all();
        $packages = AnotherPackage::all();
        return response()->json([
            'status' => 200,
            'books' => $books,
            'packages' => $packages,
        ], 200);
    }
    public function addedNewBookFromStore($mandub, $book)
    {
        $mandubBooks = MandubBook::where('mandub_id', $mandub)->where('book_id', $book)->first();
        $newMandubQuantity = $mandubBooks->mandub_quantity + $mandubBooks->station;
        // $book = Book::where('id', $book)->first();
        // $book->update([
        //     'quantity' => $book->quantity - $mandubBooks->station,
        // ]);
        $mandubBooks->update([
            'mandub_quantity' => $newMandubQuantity,
            'station' => 0
        ]);
        return response()->json([
            'status' => 200,
            'new' => $mandubBooks,
        ], 200);
    }
    public function addToCartbooks(Request $request, $mandub, $book)
    {
        $bookcart = BookCart::where('session_id', $mandub)->where('book_id', $book)->first();
        if (!$bookcart) {
            $bookcart = BookCart::create([
                'session_id' => $mandub,
                'book_id' => $book,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);
        } else {
            $bookcart->update([
                'session_id' => $mandub,
                'book_id' => $book,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);
        }
        return response()->json([
            'status' => 200,
            'book_cart' => $bookcart,
        ], 200);
    }

    public function addToCartPackages(Request $request, $mandub, $package)
    {
        $bookcart = BookCart::where('package_id', $package)->where('session_id', $mandub)->where('package_id', $package)->first();
        if (!$bookcart) {
            BookCart::create([
                'session_id' => $mandub,
                'package_id' => $package,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);
        } else {
            $bookcart->update([
                'session_id' => $mandub,
                'package_id' => $package,
                'quantity' => $request->quantity,
                'price' => $request->price,
            ]);
        }
        return response()->json([
            'status' => 200,
            'package_cart' => $bookcart,
        ], 200);
    }
    public function deleteBookItem(int $cart)
    {
        $cartItem = BookCart::where('book_id', $cart)->first();
        $cartItem->delete();
        return response()->json([
            'status' => 200,
            'package_cart' => $cartItem,
        ], 200);
    }
    public function deletePackageItem(int $cart)
    {
        $cartItem = BookCart::where('package_id', $cart)->first();
        $cartItem->delete();
        return response()->json([
            'status' => 200,
            'package_cart' => $cartItem,
        ], 200);
    }
    public function deleteAllItemsFromOrder(Request $request, $mandub)
    {
        $sessionId = $mandub;
        $items = BookCart::where('session_id', $sessionId)->delete();
        return response()->json([
            'status' => 200,
            'items' => $items,
        ], 200);
    }
    public function neworderbook(Request $request, $mandub, $city)
    {
        $sessionId = $mandub;
        $items = BookCart::where('session_id', $sessionId)->get();
        $newOrder = OrderBookDetail::create([
            'buyer' => $request->buyer,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $city,
            'price_all' => $request->price_all,
            'status' => 'current',
            'mandub_id' => $mandub
        ]);
        foreach ($items as $item) {
            OrderBookItem::create([
                'session_id' => $sessionId,
                'book_id' => $item->book_id,
                'package_id' => $item->package_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'order_id' => $newOrder->id,
            ]);
        }
        BookCart::where('session_id', $sessionId)->delete();

        return response()->json([
            'status' => 200,
            'newOrder' => $newOrder,
        ], 200);
    }
    // public function updateQuantity(Request $request, $mandub)
    // {
    //     $updates = $request->input('updates');
    //     foreach ($updates as $update) {
    //         $id = $update['id'];
    //         $quantityToUpdate = $update['quantity'];
    //         $mandubBook = MandubBook::where('mandub_id', $mandub)->where('book_id', $id)->first();
    //         if ($mandubBook && $mandubBook->mandub_quantity >= $quantityToUpdate) {
    //             $mandubBook->update([
    //                 'mandub_quantity' => $mandubBook->mandub_quantity - $quantityToUpdate,
    //             ]);
    //         } elseif ($mandubBook && $mandubBook->mandub_quantity < $quantityToUpdate) {
    //             $newquntity = $mandubBook->mandub_quantity - $quantityToUpdate;
    //             if ($mandubBook->mandub_quantity < 0 && $mandubBook->station < $mandubBook->mandub_target) {
    //                 $mandubBook->update([
    //                     'mandub_quantity' => $newquntity,
    //                     'station' => $quantityToUpdate + $mandubBook->station + $mandubBook->mandub_target,
    //                     'mandub_active' => 0,
    //                     'distributor_active' => 0
    //                 ]);
    //             } elseif($mandubBook->mandub_quantity > 0 && $mandubBook->station < $mandubBook->mandub_target ) {
    //                 $mandubBook->update([
    //                     'mandub_quantity' => $newquntity,
    //                     'station' => $newquntity * -1 + $mandubBook->station +  $mandubBook->mandub_target,
    //                     'mandub_active' => 0,
    //                     'distributor_active' => 0
    //                 ]);
    //             }
    //             elseif ($mandubBook->mandub_quantity < 0 && $mandubBook->station >= $mandubBook->mandub_target ) {
    //                 if($mandubBook->station <= $mandubBook->mandub_target-$mandubBook->mandub_quantity && $quantityToUpdate + $mandubBook->station+$mandubBook->mandub_target > $newquntity+$mandubBook->mandub_target-$mandubBook->mandub_quantity ){
    //                     $mandubBook->update([
    //                         'mandub_quantity' => $newquntity,
    //                         'station' => $quantityToUpdate + $mandubBook->station+$mandubBook->mandub_target,
    //                         'mandub_active' => 0,
    //                         'distributor_active' => 0
    //                     ]);
    //                 }else{
    //                 $mandubBook->update([
    //                     'mandub_quantity' => $newquntity,
    //                     'station' => $quantityToUpdate + $mandubBook->station,
    //                     'mandub_active' => 0,
    //                     'distributor_active' => 0
    //                 ]);
    //             }
    //             } else {
    //                 $mandubBook->update([
    //                     'mandub_quantity' => $newquntity,
    //                     'station' => $newquntity * -1 + $mandubBook->station,
    //                     'mandub_active' => 0,
    //                     'distributor_active' => 0
    //                 ]);
    //             }
    //         } else {

    //             $createmandubbooks=MandubBook::create([
    //                 'book_id' => $id,
    //                 'mandub_id' => $mandub,
    //                 'mandub_quantity' => -1 * $quantityToUpdate,
    //                 'mandub_target' => $quantityToUpdate,
    //                 'mandub_active' => 0,
    //                 'distributor_active' => 0,
    //             ]);

    //             $createmandubbooks->update([
    //                 'station' => 2* $quantityToUpdate,

    //             ]);
    //         }
    //     }
    //     return response()->json(['message' => 'تم تحديث الكميات بنجاح']);
    // }
    
    public function updateQuantity(Request $request, $mandub)
    {
        $updates = $request->input('updates');
    
        foreach ($updates as $update) {
            $id = $update['id'];
            $quantityToUpdate = $update['quantity'];
            $mandubBook = MandubBook::where('mandub_id', $mandub)->where('book_id', $id)->first();
    
            if ($mandubBook) {
                $newQuantity = $mandubBook->mandub_quantity - $quantityToUpdate;
                $updateData = [
                    'mandub_quantity' => $newQuantity,
                    'station' => $mandubBook->station,
                    'mandub_active' => 0,
                    'distributor_active' => 0
                ];
    
                if ($newQuantity < 0) {
                    if ($mandubBook->station < $mandubBook->mandub_target) {
                        $updateData['station'] += $quantityToUpdate + $mandubBook->mandub_target;
                    } elseif ($mandubBook->station >= $mandubBook->mandub_target && $mandubBook->station <= $mandubBook->mandub_target - $mandubBook->mandub_quantity) {
                        $updateData['station'] += $quantityToUpdate;
                    }
                } elseif ($newQuantity == 0) {
                    // تحديث station عندما يكون mandub_quantity يساوي 0
                    $updateData['station'] = $mandubBook->mandub_target;
                }
    
                $mandubBook->update($updateData);
            } else {
                $mandubBook = MandubBook::create([
                    'book_id' => $id,
                    'mandub_id' => $mandub,
                    'mandub_quantity' => -1 * $quantityToUpdate,
                    'mandub_target' => $quantityToUpdate,
                    'mandub_active' => 0,
                    'distributor_active' => 0,
                ]);
    
                $mandubBook->update([
                    'station' => 2 * $quantityToUpdate,
                ]);
            }
        }
    
        return response()->json(['message' => 'تم تحديث الكميات بنجاح']);
    }
    
    
    
}
