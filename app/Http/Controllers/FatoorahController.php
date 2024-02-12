<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Package;
use App\Models\UserCourse;
use App\Models\UserPackage;
use App\Services\FatoorahServices;
use GuzzleHttp\Client;

class FatoorahController extends Controller
{
    public function checkout(Request $request)
    {
        $callbackURL = route('myfatoorah.callback');
            
        $cart = CartItem::where("user_id", Auth::user()->id)->get();
        $sumPrice = $cart->sum("price");

        if ($sumPrice !== 0) {
            foreach ($cart as $item) {
                // Use updateOrCreate to create or update the order
                Order::updateOrCreate(
                    ['cart_items_id' => $item->id],
                    [
                        'total_price' => $sumPrice,
                        'status' => 'false',
                    ]
                );
            }

            // Inject the Guzzle Client into FatoorahServices constructor
            $fatoorahServices = new FatoorahServices(new Client());

            $data = [
                "CustomerName" => Auth::user()->name,
                "NotificationOption" => "LNK", // Make sure this value is correct
                "Invoicevalue" => $sumPrice,
                "CalLBackUrl" => route('callback'),
                "Errorurl" => $callbackURL,
                'MobileCountryCode' => '+965',
                'CustomerMobile' => Auth::user()->phone,
                'Language' => 'ar',
                "DisplayCurrencyIna" => 'KWT',
            ];

            $response = $fatoorahServices->sendPayment($data);
         //  dd($response);
            if (isset($response['IsSuccess']) && $response['IsSuccess'] == true) {
                OrderPayment::create([
                    'InvoiceId'  => $response['Data']['InvoiceId'],
                    'InvoiceURL' => $response['Data']['InvoiceURL'],
                    'customer_id' => Auth::user()->id,
                    'price' => $sumPrice,
                ]);

                return redirect($response['Data']['InvoiceURL']);
            }
        }
    
    
        
    
    

    //    toastr()->error('غير موجود حالياً');
        
    //    return redirect()->route('dashboard');
    }

    public function callback(Request $request)
    {
        
        $fatoorahServices = new FatoorahServices(new Client());
        $apiKey = 'S1rlYUlVdknlOmAeaJDWKwYWd0CzvYDNnVyTd_Zw3oBdD1KUiyrHlY_l9t00blRlcir3zoStVTbqeOYbz_bKpYYNRuUq2aSsBEl0G-e94mRr7mPi7udq1mbpL7ZQ0n4UFM-yITm_9a3vyJ-E2-fLOFeCvUlRjjqpUOdmSjoblx1CxUqtQjqJPuXsjEn07k4CQLYa8jCi0LXWkxasy8yXNQTsTZervKr_HM4KxQAuuk8CQp3HVleBJpOiA-fptzSBTzvXQL3x3QfTJXCWI43olPYOtLfW7BkctBoZ2g2vgN1_4lumYczlE2ZIlzVQvKnyj1HSnDa3SqrN25691nNj59ufoNiZEHPlJmFMm2sIeg1I17bbNtA1vYiSHLnZMs6jpGUaVCpMWKMzMDOAx8ZmIZL1yjrmNjvBODU4LMAOrIqoEBv84F8bI_oOZT6JYRk3raEej8T7PInLeAmOGW1nhu10eYikgg2VZBgxoSmvVpYYLPzJkCdtMA3ZOdDtplrwgNMoqhSoRJn9Ey1s4JBOsxwDA0MCHmEk89GNtFjOZ5-5t87vvSVG9BPG8DFd9ao_AZUtyU-OeEectWFZiWfnroY3Inae7yOYiil1lnQNh35wjTQJUL9ZzoMYNofjNTGn2gPC49na7-jtV8Fhk7Er4R5KAh9nF3Gxrp5wzmhU6o__nDQJ_9iWTFpbzUZ3raz3ssAXyQ'; // استبدله بمفتاح API الخاص بك
        $postFields = [
            'Key'     => $request->paymentId,
            'KeyType' => 'paymentId'
        ];
        
        $response = $fatoorahServices->callAPI("https://api.myfatoorah.com/v2/getPaymentStatus", $apiKey, $postFields);
        $response = json_decode($response);
        
        if (!isset($response->Data->InvoiceId)) {
            return response()->json(["error" => 'error', 'status' => false], 404);
        }
        
        $payment = OrderPayment::where(['InvoiceId' => $response->Data->InvoiceId])->first();
        
        if ($response->IsSuccess == true && $response->Data->InvoiceStatus == "Paid" && $payment->price == $response->Data->InvoiceValue) {
            $payment->InvoiceStatus = "Paid";
            $payment->IsSuccess = true;
            $payment->TransactionDate = $response->Data->CreatedDate;
            $payment->save();
        
            $cart = CartItem::where("user_id", Auth::user()->id)->get();
            $sumPrice = $cart->sum("price");
    
            if ($sumPrice !== 0) {
                foreach ($cart as $item) {
                    // Use updateOrCreate to create or update the order
                    Order::updateOrCreate(
                        ['cart_items_id' => $item->id],
                        [
                            'total_price' => $sumPrice,
                            'status' => 'true',
                        ]
                    );
    
                    $course = Course::find($item->course_id);
                    $package = Package::find($item->package_id);
    
                    if ($item->course_id != null && $item->price == $course->monthly_subscription_price) {
                        UserCourse::create([
                            "user_id" => $item->user_id,
                            "course_id" => $item->course_id,
                            "price" => $item->price,
                            "student_name" => Auth::user()->name,
                            "subscrip_type" => "اشتراك شهري"
                        ]);
                    } elseif ($item->course_id != null && $item->price == $course->term_price) {
                        UserCourse::create([
                            "user_id" => $item->user_id,
                            "course_id" => $item->course_id,
                            "price" => $item->price,
                            "student_name" => Auth::user()->name,
                            "subscrip_type" => "اشتراك ترم"
                        ]);
                    } elseif ($item->package_id != null) {
                        $userpackage = UserPackage::create([
                            "user_id" => $item->user_id,
                            "package_id" => $item->package_id,
                            "price" => $item->price,
                            "student_name" => Auth::user()->name,
                            "subscrip_type" => $package->package_type
                        ]);
    
                        $packages = Package::where('id', $userpackage->package_id)->first();
                        $count = $package->course->count();
    
                        foreach ($packages->course as $package) {
                            UserCourse::create([
                                "user_id" => $item->user_id,
                                "course_id" => $package->id,
                                "price" => $item->price / $count,
                                "student_name" => Auth::user()->name,
                                "subscrip_type" => $packages->package_type
                            ]);
                        }
                    }
                }
                CartItem::where("user_id", Auth::user()->id)->delete();
                toastr()->success(' تمت عملية الدفع بنجاح ');
                return redirect()->route('dashboard');
            }
        }
        
        toastr()->error(' مشكلة في الدفع ');
        return redirect()->route('dashboard');
    }
}
