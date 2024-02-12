@extends('layouts.master')
@section('css')

@section('title')
    الوحدات
@stop
@endsection
@section('page-header')
<div class="row">
    <!-- breadcrumb -->
    <img src="{{ url('assets/images/teacher.jpg') }}"
        style="width:92%; height:180px;  display: block; margin:15px auto; margin-top:0px; object-fit: fill; border-radius: 5px;"
        alt="">
</div>

<div class="page-title">
    <div class="row">
        <div class="col-sm-12"
            style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 10px; padding-bottom: 10px;  border-radius:7px; display: flex; justify-content: space-around;">
            <h4 class="mb-0" style="color:#fff ; ">وحدات {{ $course->classroom }} مادة {{ $course->subject_name }}</h4>
            @if (Auth::user()->user_type !== 'user')
                <button type="button" class="btn btn-info float-left float-sm-right " data-toggle="modal"
                    data-target="#exampleModal"
                    style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;"><img
                        src="https://cdn-icons-png.flaticon.com/128/2542/2542533.png" width="26px"> -
                    اضافة وحدة جديدة
                </button>
            @endif
        </div>
    </div>

</div>


<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<!--  Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة وحدة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('postTutorial', Route::current()->Parameter('courseId')) }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="اسم وحدة ">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">اضافة وحدة </button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                                <th>الوحدة  </th>
                                @if (Auth::user()->user_type !== 'user')
                                    <th>العمليات</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tutorials as $tutorial)
                                <tr>
                                    <td><a style="font-weight: bold;font-size: 16px"
                                            href="{{ route('showTutorialVideo', $tutorial->id) }}">{{ $tutorial->name }}</a>
                                    </td>
                                    @if (Auth::user()->user_type !== 'user')
                                        <td>
                                            <!-- Button trigger modal update -->
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $tutorial->id }}">
                                                <i class="fa fa-pencil-square"></i>
                                            </button>
                                            <div class="modal fade" id="edit{{ $tutorial->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">تعديل وحدة
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('editTutorial', $tutorial->id) }}"
                                                            method="post">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input type="text" name="name"
                                                                    class="form-control" value="{{ $tutorial->name }}"
                                                                    placeholder="اسم وحدة ">
                                                                @error('name')
                                                                    <div class="alert alert-danger">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                                </br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">اغلاق</button>
                                                                <button type="submit" class="btn btn-primary">تعديل
                                                                    وحدة
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger modal delete -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $tutorial->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <div class="modal fade" id="delete{{ $tutorial->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">حذف وحدة
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('deleteTutorial', $tutorial->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <h4> هل انت متاكد من حذف هذه وحدة ؟</h4>
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
                                    @endif
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
