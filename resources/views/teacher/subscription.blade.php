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
<!-- مجموع الارباح -->
@php
    $totalEarnings = 0;
@endphp

@foreach($teachercourses as $item)
    @php
        $teacher = \App\Models\User::where('id', $item->techer_id)->first();
        $earnTeacher = $teacher->Teacher_ratio_course / 100 * $item->price;
        $totalEarnings += $earnTeacher;
    @endphp
@endforeach
<!-- 0000 -->
<div class="rowone">
    <div class="containerone">
        <div class="itemone1 itemone"> <img src="https://cdn-icons-png.flaticon.com/128/536/536105.png " width="80px" style="padding-left: 20px;">  اجمالي عدد الاشتركات    ( {{$teachercourses->count();}} ) </div>
        <div class="itemone2 itemone"><img src="https://cdn-icons-png.flaticon.com/128/536/536105.png " width="80px" style="padding-left: 20px;">اجمالي ارباحك {{ number_format($totalEarnings, 2) }} د.ك</div>
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
                                <th> المادة </th>
                                <th> الصف</th>
                                <th> الطالب </th>
                                <th>نوع الاشتراك</th>
                                <th>ارباحك</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($teachercourses as $item)
                            @php
                            $teacher = \App\Models\User::where('id', $item->techer_id)->first();
                            $earnTeacher=$teacher->Teacher_ratio_course/100*$item->price;
                            @endphp
                            <tr>
                                <td>{{$item->subject_name}}</td>
                                <td>{{$item->classroom}}</td>
                                <td>{{$item->student_name}}</td>
                                <td>{{$item->subscrip_type}}</td>
                                <td>{{ number_format($earnTeacher, 2) }}</td>
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