@extends('layouts.master')
@section('css')
@section('title')
الحلقات
@stop
@endsection
@section('page-header')
<div class="row">
    <!-- breadcrumb -->
    <img src="{{ url('assets/images/teacher.jpg') }}" style="width:92%; height:180px;  display: block; margin:15px auto; margin-top:0px; object-fit: fill; border-radius: 5px;" alt="">
</div>

<div class="page-title">
    <div class="row">
        <div class="col-sm-12" style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 10px; padding-bottom: 10px;  border-radius:7px; display: flex; justify-content: space-around;">
            <h2 class="mb-0" style="color:#fff ; ">قائمة فيديوهات</h2>
            @if (Auth::user()->user_type !== 'user')
            <button type="button" class="btn btn-info float-left float-sm-right " data-toggle="modal" data-target="#exampleModal" style="font-size: 18px; font-family:Amiri; line-height: 1.2;">
                <img src="https://cdn-icons-png.flaticon.com/128/6348/6348571.png" width="26px"> -
                اضافة فيديو جديد
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة حلقة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('postTutorialVideo', Route::current()->Parameter('tutorialId')) }}" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="text" name="name" required class="form-control" placeholder="عنوان الحلقة">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </br>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">رفع PDF</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- File Upload Form -->
                                        <div class="form-group">
                                            <label for="pdfFile">اختر ملف:</label>
                                            <input type="file" class="form-control-file" id="pdf" name="pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </br>
                    <input type="text" required name="link" class="form-control" placeholder="لينك الحلقة">
                    @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </br>
                </div>
                <div class="row justify-content-between text-left">
                    <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">نوع الحلقة
                            <span class="text-danger">
                                *</span></label>
                        <div class="btn-group col-md-2" data-toggle="buttons">
                            <label class="btn btn-gender btn-default active">
                                <input type="radio" required id="female" name="type" value="free"> مجاني
                            </label>
                            <label class="btn btn-gender btn-default">
                                <input type="radio" required id="male" name="type" value="cash"> مدفوع
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">اضافة حلقة </button>
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
                                <th> الترتيب</th>
                                <th>عنوان الحلقة</th>
                                <th>حالة الحلقة </th>
                                @if (Auth::user()->user_type !== 'user')
                                <th>العمليات</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody  class="sortable">
                            @foreach ($tutorial as $video)
                            @php
                            $isUserSub = false;
                            foreach ($courses as $sub) {
                                $tut_items = \App\Models\Tutorial::where('course_id' ,$sub->id )->get();
                                if ($tut_items ){
                                 foreach($tut_items as $tut_item){
                                    if($tut_item->id == $video->tutorial_id){
                            $isUserSub = true;
                            break;
                            }
                            }
                            }
                        }
                            @endphp
                            <tr id="{{ $video->id }}">
                                <td>{{ $video->order }}</td>
                                <td>
                                    @if ($isUserSub == true || $video->type == 'free' || Auth::user()->user_type !== 'user')
                                    <a href="{{ route('teacherCourseTutorialVideoShow', $video->id) }}">{{ $video->name }}</a>
                                    @else
                                    <a href="#">{{ $video->name }}</a>
                                    @endif
                                </td>
                                @if ($video->type == 'cash')
                                <td style="background-color: #41a4f5; color: #fff;font-weight: bolder;font-size: 15px;border-radius: 10px">
                                    مدفوعة</td>
                                @else
                                <td style="background-color: #65ff47; color: #fff;font-weight: bolder;font-size: 15px;border-radius: 10px">
                                    مجانية</td>
                                @endif
                                @if (Auth::user()->user_type !== 'user')
                                <td>
                                    <!-- Button trigger modal update -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $video->id }}">
                                        <i class="fa fa-pencil-square"></i>
                                    </button>
                                    <div class="modal fade" id="edit{{ $video->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل
                                                        الحلقة
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('editTutorialVideo', $video->id) }}" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="text" name="name" class="form-control" value="{{ $video->name }}" placeholder="عنوان الحلقة">
                                                        <br>
                                                        <input type="text" name="link" class="form-control" value="{{ $video->link }}" placeholder="لينك الحلقة">
                                                    </div>
                                                    <div class="row justify-content-between text-left">
                                                        <div class="form-group col-12 flex-column d-flex">
                                                            <label class="form-control-label px-3">نوع الحلقة <span class="text-danger">*</span></label>
                                                            <div class="btn-group col-md-2" data-toggle="buttons">
                                                                <label class="btn btn-gender btn-default {{ $video->type == 'free' ? 'active' : '' }}">
                                                                    <input type="radio" name="type" value="free" {{ $video->type == 'free' ? 'checked' : '' }}> مجاني
                                                                </label>
                                                                <label class="btn btn-gender btn-default {{ $video->type == 'cash' ? 'active' : '' }}">
                                                                    <input type="radio" name="type" value="cash" {{ $video->type == 'cash' ? 'checked' : '' }}> مدفوع
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="container mt-5">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-6">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h5 class="card-title">رفع PDF</h5>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <!-- File Upload Form -->
                                                                        <div class="form-group">
                                                                            <label for="pdfFile">اختر ملف:</label>
                                                                            <input type="file" class="form-control-file" id="pdf" name="pdf">
                                                                            @if($video->pdf)
                                                                            <p class="mt-2">الملف الحالي: {{ $video->pdf }}</p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary"> تعديل </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal delete -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$video->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="delete{{$video->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">حذف الحلقة
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('deleteTutorialVideo', $video->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h4> هل انت متاكد من حذف هذه الحلقة ؟</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
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

<script>
    function check() {
        document.getElementById("male").checked = true;
    }
</script>

<!-- row closed -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the sortable table
        var sortableTable = new Sortable(document.querySelector('.sortable'), {
            animation: 150,
            ghostClass: 'bg-light',
        });

        // Listen for the sortable's onEnd event and update the order
        sortableTable.options.onEnd = function (evt) {
            updateRowOrder(evt);
        };

        // Function to update the row order after dragging
        function updateRowOrder(evt) {

            var rows = document.querySelectorAll('.sortable tr');
            var newOrder = [];
            // Get the new order of row IDs
            rows.forEach(function (row) {
                newOrder.push(row.id.replace('row-', ''));
            });
            console.log(newOrder);

            // Send an AJAX request to the server with the updated order
            fetch('{{ route('updateVideoOrder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ order: newOrder }),
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));
        }
    });
</script>
@endsection
