@extends('layouts.master')
@section('css')
@section('title')
الطلبيات المكتملة للمندوب
@stop
@endsection
@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-12" style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin-bottom: 10px; border-radius:7px;">
            <h1 class="mb-0" style="color:#fff ;text-align:center; padding-top: 15px; padding-bottom: 15px; "> قائمة الطلبيات المكتملة للمندوب {{$mandubData->name}}
            </h1>
        </div>
    </div>
</div>
@php
$totalPrice = 0;
$totalDeliveryPrice = 0;
@endphp
@foreach($orders as $order)
@php
$city = \App\Models\City::where('id', $order->city_id)->first();
@endphp
@php
$totalPrice += $order->price_all;
$totalDeliveryPrice += $city->deliver_price;
@endphp
@endforeach
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="field-1" class="control-label">مجموع الطلبيات </label>
            <input type="text" value="{{$orders->count()}}" class="form-control" disabled="">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label"> مجموع سعر الطلبيات </label>
            <input type="text" value="{{$totalPrice}}" class="form-control" disabled="">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label" > مجموع سعر التوصيلات </label>
            <input type="text" value="{{$totalDeliveryPrice}}" class="form-control" disabled="">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="field-1" class="control-label">الاجمالي</label>
            <input type="text" value="{{$totalPrice+$totalDeliveryPrice}}" class="form-control" disabled="">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group text-center">
        <label for="field-1" class="control-label">التحصيل من المندوب</label>
            <a class="form-control bg-dark text-center rounded " href="{{route('endedAllOrderCompleteForMandub',$mandubData->id)}}" style="color:#fff"><strong>تحصيل الكل</strong></a>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0" style="text-align:center">
                        <thead>
                            <tr>
                                <th>وقت الطلب </th>
                                <th> اسم المشتري </th>
                                <th>رقم التليفون </th>
                                <th> المحافظه</th>
                                <th> سعر الطلب </th>
                                <th> سعر التوصيل </th>
                                <th> الاجمالي</th>
                                <th>العمليات </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->buyer}}</td>
                                <td>{{$order->phone}}</td>

                                <td>
                                    @php
                                    $city = \App\Models\City::where('id', $order->city_id)->first();
                                    @endphp
                                    {{$city->name}}
                                </td>
                                <td>{{$order->price_all}}</td>
                                <td>
                                    @php
                                    $city = \App\Models\City::where('id', $order->city_id)->first();
                                    @endphp
                                    {{$city->deliver_price}}
                                </td>
                                <td>
                                    @php
                                    $city = \App\Models\City::where('id', $order->city_id)->first();
                                    @endphp
                                    {{$city->deliver_price + $order->price_all}}
                                </td>
                                <td>
                                    <!-- Button trigger modal update -->
                                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-sliders" style="font-size: 20px;"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                                        <a href="{{route('getNewOrderDetails',$order->id)}}">
                                            <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-dark btn-sm">
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                تفاصيل العملية
                                            </div>
                                        </a>
                                        <!-- <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$order->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            حذف
                                        </div> -->
                                    </div>
                                    <div class="modal fade" id="delete{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">حذف </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('deleteCurrentOrderDetails',$order->id)}}" method="post">
                                                    @csrf
                                                    <h4 class="modal-body">
                                                        هل انت متاكد من حذف هذه العملية ؟
                                                    </h4>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary"> حذف
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal show -->
                                    <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show">
                          <i class="fa fa-eye"></i>
                          </button>
                 -->
                                </td>

                            </tr>
                            @endforeach

                            </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- row closed -->
@endsection
@section('js')

@endsection