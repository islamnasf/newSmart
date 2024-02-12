@extends('layouts.master')
@section('css')

@section('title')
الاشتركات
@stop
@endsection
<style>
    .rawone {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #175166;
        width: 100%;
    }

    .containerone {
        display: flex;
        height: 120px;
        width: 100%;
        overflow: hidden;
    }

    .itemone1 {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #023047;
        /* لون الخلفية */
        color: #fff;
        /* لون النص */
        font-size: 23px;


    }

    .itemone2 {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #219ebc;
        /* لون الخلفية */
        color: #fff;
        /* لون النص */
        font-size: 23px;


    }

    .itemone3 {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #669bbc;
        /* لون الخلفية */
        color: #fff;
        /* لون النص */
        font-size: 23px;
    }

    @media (max-width: 600px) {
        .containerone {
            flex-direction: column;
            height: auto;
        }

        .itemone {
            flex: none;
            height: 100px;
            /* قم بتحديد الارتفاع المناسب للعناصر عند تغيير التوجيه إلى عمودي */
        }
    }
</style>
@section('page-header')
<div class="rowone">
    <div class="containerone">
        <div class="itemone1 itemone"> <img src="https://cdn-icons-png.flaticon.com/128/536/536105.png " width="80px" style="padding-left: 20px;"> اجمالي المبيعات {{$priceAll}} د.ك</div>
        <div class="itemone2 itemone"><img src="https://cdn-icons-png.flaticon.com/128/536/536105.png " width="80px" style="padding-left: 20px;">ارباح المعلمين {{$price_all_teacher}} د.ك</div>
        <div class="itemone3 itemone"><img src="https://cdn-icons-png.flaticon.com/128/536/536105.png " width="80px" style="padding-left: 20px;">ارباح المنصة {{$platformEarn}} د.ك</div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<!--  Add Modal -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0" style="text-align:center">
                        <thead>
                            <tr>
                                <th>تاريخ الاشتراك </th>
                                <th>اسم المادة </th>
                                <th>اسم الاشتراك</th>
                                <th>اسم المعلم</th>
                                <th>اسم الطالب </th>
                                <th>سعر الاشتراك</th>
                                <th>حساب المعلم</th>
                                <th> صافي الربح</th>
                                <th>تاريخ الانتهاء </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachercourses as $sub)
                            @php
                            $teacherEarn=$sub->techer->Teacher_ratio_course/100 * $sub->price;
                            $earn=$sub->price - $teacherEarn
                            @endphp
                            <tr>
                                <td>{{$sub->date}}</td>
                                <td>{{$sub->subject_name}}</td>
                                <td>{{$sub->subscrip_type}}</td>
                                <td>{{$sub->techer->name}}</td>
                                <td>{{$sub->student_name}}</td>
                                <td>{{$sub->price}}</td>
                                <td>{{$teacherEarn}}</td>
                                <td>{{$earn}}</td>
                                <td>{{$sub->expiry_date}}</td>
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