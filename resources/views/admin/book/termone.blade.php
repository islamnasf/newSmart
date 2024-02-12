@extends('layouts.master')
@section('css')
@section('title')
الترم الاول
@stop
@endsection
@section('page-header')


<div class="page-title">
    <div class="row">
        <div class="col-sm-12" style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 10px; padding-bottom: 10px;  border-radius:7px; display: flex; justify-content: space-around;">
            <h1 class="mb-0" style="color:#fff ; "> <span class="text-danger">
                    <i class=" fa fa-hand-pointer-o highlight-icon" aria-hidden="true" style="color:#fff; font-size:45px;  "></i>
                </span>الترم الاول </h1>
        </div>
    </div>
</div>
<div class="text-right goal">
    <button style="background-color: #175166; border: none;border-radius: 5px;" type="button" data-toggle="modal" data-target="#term">
        <h4 style="background-color: #175166; padding: 10px 10px 0px 10px ;  color: #fff; font-size: 30px;"> <img src="https://cdn-icons-png.flaticon.com/128/7887/7887083.png" width="27px"> بيانات الترم </h4>
    </button>
</div>
<div class="modal fade" id="term" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تعديل بيانات الترم </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('termOneDetail')}}" method="post">
                    @csrf
                    <label style="font-size: 15px; font-weight: bold;"> بداية الترم </label>
                    <input type="date" id="job" onblur="validate(5)" name="start" class="form-control" required value="{{ $term ? $term->start : '' }}">
                    <label style="font-size: 15px; font-weight: bold;"> نهاية الترم </label>
                    <input type="date" id="job" onblur="validate(5)" name="end" class="form-control" required value="{{ $term ? $term->end : '' }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-primary"> حفظ </button>
            </div>
            </form>
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
                                <th> المذكرة </th>
                                <th> الصف </th>
                                <th>المعلم </th>
                                <th>سعر البيع </th>
                                <th>الكمية</th>
                                <th> العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{$book->name}}</td>
                                <td>{{$book->classroom}}</td>
                                <td>{{$book->techer->name}}</td>
                                <td>{{$book->book_price}}</td>
                                <td>{{$book->quantity}}</td>

                                <td>
                                    <!-- Button trigger modal update -->
                                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-sliders" style="font-size: 20px;"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                                        <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$book->id}}">
                                                <a href="{{route('editBook',$book->id)}}"><i class="fa fa-edit"></i></a>
                                            </button>
                                            تعديل البيانات
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
<script>
     function validate(val) {
                v1 = document.getElementById("fname");
                v2 = document.getElementById("lname");
                v3 = document.getElementById("email");
                v4 = document.getElementById("mob");
                v5 = document.getElementById("job");
                v6 = document.getElementById("ans");

                flag1 = true;
                flag2 = true;
                flag3 = true;
                flag4 = true;
                flag5 = true;
                flag6 = true;

                if (val >= 1 || val == 0) {
                    if (v1.value == "") {
                        v1.style.borderColor = "red";
                        flag1 = false;
                    } else {
                        v1.style.borderColor = "green";
                        flag1 = true;
                    }
                }

                if (val >= 2 || val == 0) {
                    if (v2.value == "") {
                        v2.style.borderColor = "red";
                        flag2 = false;
                    } else {
                        v2.style.borderColor = "green";
                        flag2 = true;
                    }
                }
                if (val >= 3 || val == 0) {
                    if (v3.value == "") {
                        v3.style.borderColor = "red";
                        flag3 = false;
                    } else {
                        v3.style.borderColor = "green";
                        flag3 = true;
                    }
                }
                if (val >= 4 || val == 0) {
                    if (v4.value == "") {
                        v4.style.borderColor = "red";
                        flag4 = false;
                    } else {
                        v4.style.borderColor = "green";
                        flag4 = true;
                    }
                }
                if (val >= 5 || val == 0) {
                    if (v5.value == "") {
                        v5.style.borderColor = "red";
                        flag5 = false;
                    } else {
                        v5.style.borderColor = "green";
                        flag5 = true;
                    }
                }
                if (val >= 6 || val == 0) {
                    if (v6.value == "") {
                        v6.style.borderColor = "red";
                        flag6 = false;
                    } else {
                        v6.style.borderColor = "green";
                        flag6 = true;
                    }
                }

                flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

                return flag;
            }
</script>


<!-- row closed -->
@endsection
@section('js')

@endsection