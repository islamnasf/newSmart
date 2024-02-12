<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    BookCart,
    City,
    OrderBookItem,
    OrderBookDetail
};
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newOrder = OrderBookDetail::create([
            'buyer' => $request->buyer,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
        ]);
        $items = $request->input('items');
        $price = 0;
        foreach ($items as $item) {
            $orderitem = OrderBookItem::create([
                'session_id' => "222",
                'book_id' => $item['book_id'],
                'package_id' => $item['package_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'order_id' => $newOrder->id,
            ]);
    
            $price += $item['price'];
        }
        $newOrder->update([
            'price_all' => $price,
        ]);
    
        // إعرض رسالة الشكر بعد اتمام الطلب
        return response()->json([
            'status' => 200,
            'newOrder' => $newOrder,
            'orderitem' => $orderitem
        ], 200);
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function citiesForOrder(){
        $cities=City::get();
        return response()->json([
            'status'=>200,
            'cities'=> $cities,
        ],200);

    }
}
