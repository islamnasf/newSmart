@extends('layouts.master')
@section('css')
@section('title')
تفاصيل الطلب
@stop
@endsection
@section('page-header')
<div class="row my-5 bg-light">
    <div class="col-12">
        <div class="card-box ">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-12" style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin-bottom: 10px; border-radius:7px;">
                        <h2 class="mb-0" style="color:#fff ;text-align:center; padding-top: 10px; padding-bottom: 10px;"> تفاصيل شراء مذكرات
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-md-6">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;"><i class="fe-user font-18 align-middle mr-2"></i>إسم المشترى : {{$order->buyer}} </h5>
                </div>
                <div class="col-md-6">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 text-danger font-weight-bold"><i class="fe-phone-forwarded font-18 align-middle mr-2"></i>رقم الهاتف : {{$order->phone}} </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;"><i class="mdi mdi-folder-text-outline font-18 align-middle mr-2"></i>المحافظة :
                        @php
                        $city = \App\Models\City::where('id', $order->city_id)->first();
                        @endphp
                        {{$city->name}}
                    </h5>
                </div>
                <div class="col-md-6">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;"> المندوب :
                        @php
                        $mandub = \App\Models\User::where('id', $order->mandub_id)->first();
                        @endphp
                        @if($mandub)
                        {{$mandub->name}}
                        @else
                        لم يتم التعين
                        @endif
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;"><i class="la la-map-marker font-18 align-middle mr-2"></i>العنوان بالتفصيل : {{$order->address}}</h5>
                </div>
                <div class="col-md-6">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;"><i class="mdi mdi-timer font-18 align-middle mr-2"></i>وقت العملية : {{$order->created_at}} </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table mt-4 table-centered">
                            <tbody>
                                <tr style="text-align: center;" class="style_print">
                                    <th class="style_print" style="background-color:#175166; color:#fff;">المذكرة</th>
                                    <th class="style_print" style="background-color:#00222e; color:#fff;">الصف</th>
                                    <th class="style_print" style="background-color:#175166; color:#fff;">سعر المذكرة</th>
                                    <th class="style_print" style="background-color:#00222e; color:#fff;">الكميه </th>
                                    <th class="style_print" style="background-color:#175166; color:#fff;">الإجمالى </th>
                                </tr>
                            </tbody>
                            <tbody>
                                @foreach($order_items as $item)
                                @php
                                $book = \App\Models\Book::find($item->book_id);
                                $package = \App\Models\AnotherPackage::find($item->package_id);
                                @endphp

                                <tr style="text-align: center; font-size: 18px;">
                                    <td>
                                        <i class="mdi mdi-folder-text-outline align-middle mr-2"></i>
                                        <span class="ml-2">
                                            @if($book)
                                            {{ $book->name }}
                                            @elseif($package)
                                            {{ $package->name }}
                                            @endif
                                        </span>
                                    </td>
                                    <td><span class="ml-2">
                                            @if($book)
                                            {{ $book->classroom }}
                                            @elseif($package)
                                            {{ $package->class }}
                                            @endif
                                        </span></td>
                                    <td><span class="ml-2">
                                            @if($book)
                                            {{ $book->book_price }}
                                            @elseif($package)
                                            {{ $package->price }}
                                            @endif
                                        </span></td>
                                    <td><span class="ml-2">
                                            {{$item->quantity}}
                                        </span></td>
                                    <td><span class="ml-2">
                                            @if($book)
                                            {{ $book->book_price*$item->quantity }}
                                            @elseif($package)
                                            {{ $package->price*$item->quantity }}
                                            @endif
                                        </span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div> <!-- end col -->
            </div>
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-12" style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin-bottom: 10px; border-radius:7px;">
                        <h2 class="mb-0" style="color:#fff ;text-align:center; padding-top: 10px; padding-bottom: 10px; "> تفاصيل الفاتورة
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;">تكلفة التوصيل : @php
                        $city = \App\Models\City::where('id', $order->city_id)->first();
                        @endphp
                        {{$city->deliver_price}} د.ك
                    </h5>
                </div>
                <div class="col-md-4">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;">إجمالى المشتريات : {{$order->price_all}} د.ك</h5>
                </div>
                <div class="col-md-4">
                    <h5 role="link" aria-disabled="true" class="list-group-item border-0 font-weight-bold" style="color:#175166!important;">إجمالى الفاتورة : {{$city->deliver_price + $order->price_all}} د.ك</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection