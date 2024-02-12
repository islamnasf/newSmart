@extends('layouts.master')
@section('css')
@section('title')
الطلبيات الجديده
@stop
@endsection
@section('page-header')

<div class="page-title">
    <div class="row">
        <div class="col-sm-12" style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin-bottom: 10px; border-radius:7px;">
            <h1 class="mb-0" style="color:#fff ;text-align:center; padding-top: 15px; padding-bottom: 15px; "> <img src="https://cdn-icons-png.flaticon.com/128/11391/11391420.png" width="50px"> قائمة الطلبيات الجديدة
                <img src="https://cdn-icons-png.flaticon.com/128/11391/11391420.png" width="50px">
            </h1>
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
                                        <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$order->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            حذف
                                        </div>


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
                                                <form action="{{route('deleteNewOrderDetails',$order->id)}}" method="post">
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