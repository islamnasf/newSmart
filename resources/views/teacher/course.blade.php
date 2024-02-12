@extends('layouts.master')
@section('css')
@section('title')
الكورسات

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="row">
    <div>
                <h2 style="position: absolute; left:10%; top:10%; color:#dc3545"> الاجمالي ({{$courses->count()}})</h2>
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
            <h2 class="mb-0" style="color:#fff ; "> المواد المفعلة</h2>

        </div>
    </div>

</div>



<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<!--  Add Modal -->


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
                                <th>المادة</th>
                                <th>الصف</th>
                                <th>عدد المشتركين</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td><a
                                            href="{{ route('teacherCourseTutorialShow', $course->id) }}">{{ $course->subject_name }}</a>
                                    </td>
                                    <td>{{ $course->classroom }}</td>
                                    <td>
                                    {{ $course->user()->count()}}
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
