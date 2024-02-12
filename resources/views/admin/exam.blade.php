@extends('layouts.master')
@section('css')

@section('title')
    الاختبارات
@stop
@endsection
@section('page-header')
<div class="row">
    <div>
        <h2 style="position: absolute; left:10%; top:10%; color:#dc3545"> الاجمالي (0)</h2>
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
            <h2 class="mb-0" style="color:#fff ; "> الاختبارات </h2>
            <button type="button" class="btn btn-info float-left float-sm-right " data-toggle="modal"
                data-target="#exampleModal" style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;"><i
                    class="fa fa-location-arrow"></i> -
                اضافة اختبار جديد
            </button>
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
                <h5 class="modal-title" id="exampleModalLabel">اضافة الاختبارت</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form action="{{ route('postExam') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="subject" class="form-control" placeholder="اسم المادة">
                    </br>

                    <!-- <input type="text" name="grade" class="form-control" placeholder="المرحلة الدرسية "> -->

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
                    <div>
                        <select class="form-control" name="season" placeholder="الفصل الدراسي">
                            <option selected>اختر الفصل الدراسي</option>
                            <option value="ترم اول">ترم اول</option>
                            <option value="ترم تاني">ترم تاني</option>
                        </select>
                    </div>
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


                    <label style="font-size: 15px ; font-weight: bolder;">اختبارات سابقة </label>
                    <input type="file" name="previous_test" id="previous_test" class="form-control">
                    <label style="font-size: 15px ; font-weight: bolder;"> حل أسئلة الكتاب </label>
                    <input type="file" name="book_test" id="book_test" class="form-control">
                    <label style="font-size: 15px ; font-weight: bolder;">بنك محلول</label>
                    <input type="file" name="solved_test" id="solved_test" class="form-control">
                    <label style="font-size: 15px ; font-weight: bolder;"> بنك غير محلول </label>
                    <input type="file" name="unsolved_test" id="unsolved_test" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-primary">اضافة </button>
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
                                <th>اسم المادة </th>
                                <th>الصف</th>
                                <th>الفصل</th>
                                <th>اختبارات سابقة </th>
                                <th> بنك غير محلول </th>
                                <th> بنك محلول </th>
                                <th> حل اسئلة الكتاب </th>
                                <th> العمليات </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $exam->subject }}</td>
                                    <td>{{ $exam->group }}</td>
                                    <td>{{ $exam->season }}</td>
                                    <td>
                                        @if ($exam->previous_test != null)
                                            <a href="{{ route('examDownload', $exam->previous_test) }}"
                                                class='btn btn-ghost-info'>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($exam->unsolved_test != null)
                                            <a href="{{ route('examDownload', $exam->unsolved_test) }}"
                                                class='btn btn-ghost-info'>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @endif


                                    </td>
                                    <td>
                                        @if ($exam->solved_test != null)
                                            <a href="{{ route('examDownload', $exam->solved_test) }}"
                                                class='btn btn-ghost-info'>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($exam->book_test != null)
                                            <a href="{{ route('examDownload', $exam->book_test) }}"
                                                class='btn btn-ghost-info'>
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @endif
                                    </td>



                                    <td>
                                        <!-- Button trigger modal update -->
                                        <a class="nav-link top-nav" data-toggle="dropdown" href="#"
                                            role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-sliders" style="font-size: 20px;"></i>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                                            <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-info btn-sm"
                                                    data-toggle="modal" data-target="#edit{{ $exam->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                تعديل البيانات
                                            </div>
                                            <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-toggle="modal" data-target="#delete{{ $exam->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                حذف
                                            </div>



                                            <!-- <a href="#" class="dropdown-item">New invoice received <small
                                class="float-right text-muted time">22 mins</small> </a> -->
                                        </div>



                                        <!--  edit Modal -->
                                        <div class="modal fade" id="edit{{ $exam->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">

                                                        <form action="{{ route('updateExam') }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name='id'
                                                                value="{{ $exam->id }}">
                                                            <input type="hidden" name='old_pdf1'
                                                                value="{{ $exam->previous_test }}">
                                                            <input type="hidden" name='old_pdf2'
                                                                value="{{ $exam->book_test }}">
                                                            <input type="hidden" name='old_pdf3'
                                                                value="{{ $exam->solved_test }}">
                                                            <input type="hidden" name='old_pdf4'
                                                                value="{{ $exam->unsolved_test }}">

                                                            <input type="text" name="subject" class="form-control"
                                                                value="{{ $exam->subject }}">
                                                            </br>
                                                            <label
                                                                style="font-size: 15px ; font-weight: bolder;">اختبارات
                                                                سابقة </label>
                                                            <input type="file" name="previous_test"
                                                                id="previous_test" class="form-control">
                                                            <label style="font-size: 15px ; font-weight: bolder;"> حل
                                                                أسئلة الكتاب </label>
                                                            <input type="file" name="book_test" id="book_test"
                                                                class="form-control">
                                                            <label style="font-size: 15px ; font-weight: bolder;">بنك
                                                                محلول</label>
                                                            <input type="file" name="solved_test" id="solved_test"
                                                                class="form-control">
                                                            <label style="font-size: 15px ; font-weight: bolder;"> بنك
                                                                غير محلول </label>
                                                            <input type="file" name="unsolved_test"
                                                                id="unsolved_test" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary"> تعديل
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal delete -->
                                        <!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">
<i class="fa fa-trash"></i>
 delete Modal -->

                                        <div class="modal fade" id="delete{{ $exam->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف المرحلة
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>هل انت متاكد من الحذف ؟</h4>
                                                    </div>
                                                    <form action="{{ route('deleteExam') }}" method="post">
                                                        @csrf

                                                        <input id="id" type="hidden" name="id"
                                                            class="form-control" value="{{ $exam->id }}">
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
