@extends('layouts.master')
@section('css')

@section('title')
     الترم الاول
@stop
@endsection
@section('page-header')


<div class="row">
    <div>
        <h2 style="position: absolute; left:10%; top:10%; color:#dc3545">  
            ({{ $count }})</h2>
    </div>
    <!-- breadcrumb -->
    <img src="{{ url('assets/images/teacher.jpg') }}"
        style="width:92%; height:180px;  display: block; margin:15px auto; margin-top:0px; object-fit: fill; border-radius: 5px;"
        alt="">
</div>

<div class="page-title">
    <div class="row">
        <div class="col-sm-12"
            style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 10px; padding-bottom: 10px;  border-radius:7px; display: flex; justify-content: space-around;">
            <h2 class="mb-0" style="color:#fff ; ">الكورسات</h2>
            <a href="{{ route('addCourse') }}" class="btn btn-info float-left float-sm-right "
                data-target="#exampleModal" style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;"><i
                    class="fa fa-columns"></i> -
                اضافة كورس جديد
            </a>
        </div>
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
                                <th>اسم المادة </th>
                                <th>الصف</th>
                                <th>اسم المعلم</th>
                                <th>الاشتراك الشهري</th>
                                <th>سعر الترم</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td><a
                                            href="{{ route('showTutorial', $course->id) }}">{{ $course->subject_name }}</a>
                                    </td>
                                    <td>{{ $course->classroom }}</td>
                                    <td><a
                                            href="{{ route('showTutorial', $course->id) }}">{{ $course->techer->name }}</a>
                                    </td>
                                    <td>{{ $course->monthly_subscription_price }}</td>
                                    <td>{{ $course->term_price }}</td>
                                    <td>
                                        <!-- Button trigger modal update -->
                                        <a href="{{ route('showEditCourse', $course->id) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil-square"></i>
                                        </a>
                                        <!-- Button trigger modal delete -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $course->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="delete{{ $course->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف الكورس</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('deleteCourse', $course->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h4> هل انت متاكد من حذف هذه المادة ؟</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">اغلاق</button>
                                                            <button type="submit" class="btn btn-primary"> حذف
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
