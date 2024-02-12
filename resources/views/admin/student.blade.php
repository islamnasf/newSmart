@extends('layouts.master')
@section('css')
@section('title')
الطلبة
@stop
@endsection
@section('page-header')
<div class="row">
    <div>
        <h2 style="position: absolute; left:10%; top:5%; color:#dc3545"> الاجمالي ({{ $studentCount }})</h2>
        <h3 style="position: absolute; left:11%; top:8%;  "> مشترك ({{ $totalSub }})</h3>
    </div>
    <!-- breadcrumb -->
    <img src="{{ url('assets/images/teacher.jpg') }}" style="width:92%; height:180px;  display: block; margin:15px auto; margin-top:0px; object-fit: fill; border-radius: 5px;" alt="">
</div>
<div class="page-title">
    <div class="row">
        <div class="col-sm-12" style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin-bottom: 10px; border-radius:7px;">
            <h2 class="mb-0" style="color:#fff ;text-align:center; padding-top: 10px; padding-bottom: 10px; "> الطلبة
            </h2>
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
                                <th>اسم الطالب </th>
                                <th>الصف </th>
                                <th>رقم التلفون </th>
                                <th>الرقم السري</th>
                                <th>تاريخ الاشتراك </th>
                                <th>حالة الاشتراك </th>
                                <th> عدد التجديد </th>
                                <th> العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->group }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->user_password }}</td>
                                <td>{{ $student->date }}</td>
                                <td>
                                    @if($student->course()->count() >= 1)
                                    <span class='bg-success text-light rounded p-1 pl-3 pr-3'><strong>مشترك</strong></span>
                                    </span>
                                    @else
                                    <span class='bg-danger text-light rounded p-1'> غير مشترك </span>
                                    @endif
                                </td>
                                <td>0</td>
                                <td>
                                    <!-- Button trigger modal update -->
                                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-sliders" style="font-size: 20px;"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                                        <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $student->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            تعديل البيانات
                                        </div>
                                        <!-- <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#editGroup{{ $student->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                تعديل الصف
                                            </div> -->
                                        <!-- <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $student->id }}">
                            <i class="fa fa-edit"></i>
                          </button>
                          تعديل البيانات
                    </div> -->
                                        <!-- <a href="#" class="dropdown-item">New invoice received <small
                class="float-right text-muted time">22 mins</small> </a> -->
                                    </div>
                                    <!--  edit Modal -->
                                    <div class="modal fade" id="edit{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('updateStudent', $student->id) }}" method="post">
                                                        @csrf
                                                        <label style="font-size: 15px; font-weight: bold;"> اسم
                                                            الطالب </label>
                                                        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                                                        </br>
                                                        <label style="font-size: 15px; font-weight: bold;"> رقم
                                                            الهاتف </label>
                                                        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                                                        </br>
                                                        <label style="font-size: 15px; font-weight: bold;"> الرقم
                                                            السري </label>
                                                        <input type="text" name="password" class="form-control" value="{{ $student->user_password }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-primary"> تعديل </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  edit Group Modal -->
                                    <div class="modal fade" id="editGroup{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('updateGroupStudent', $student->id) }}" method="post">
                                                        @csrf
                                                        <div>
                                                            <select id="category" class="form-control" placeholder="المرحلة الدرسية " name="grade">
                                                                <option selected>اختر المرحلة الدراسية </option>
                                                                <option value="ابتدائي">ابتدائي</option>
                                                                <option value="متوسط">متوسط</option>
                                                                <option value="ثانوي">ثانوي</option>
                                                            </select>
                                                        </div>
                                                        </br>

                                                        <div>
                                                            <select id="item" class="form-control" placeholder="الصف الدراسي" name="group">
                                                                <option selected>اختر الصف الدراسية </option>
                                                            </select>
                                                        </div>
                                                        </br>
                                                        <script>
                                                            // Sample data for items based on categories
                                                            const items = {
                                                                ابتدائي: ['الصف الرابع', 'الصف الخامس'],
                                                                متوسط: ['الصف السادس', 'الصف السابع', 'الصف الثامن', 'الصف التاسع'],
                                                                ثانوي: ['الصف العاشر ', 'الصف الحادي عشر ', 'الصف الثاني عشر ']
                                                            };

                                                            // Function to update the items based on the selected category
                                                            function updateItems() {
                                                                const categorySelect = document.getElementById('category');
                                                                const itemSelect = document.getElementById('item');
                                                                const selectedCategory = categorySelect.value;

                                                                // Clear existing options
                                                                itemSelect.innerHTML = '';

                                                                // Add new options based on the selected category
                                                                items[selectedCategory].forEach(item => {
                                                                    const option = document.createElement('option');
                                                                    option.value = item;
                                                                    option.text = item;
                                                                    itemSelect.add(option);
                                                                });
                                                            }
                                                            // Attach the updateItems function to the change event of the category select
                                                            document.getElementById('category').addEventListener('change', updateItems);

                                                            // Initial call to populate the items based on the default selected category
                                                            updateItems();
                                                        </script>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                    <button type="submit" class="btn btn-primary"> تعديل البيانات
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal delete -->
                                    @if($student->course()->count() < 1)
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$student->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @endif
                                    <div class="modal fade" id="delete{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">حذف </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('deleteStudentNotSub',$student->id)}}" method="post">
                                                    @csrf
                                                    <h4 class="modal-body">
                                                        هل انت متاكد من حذف هذا الطالب ؟
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