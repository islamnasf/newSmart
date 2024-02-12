@extends('layouts.master')
@section('css')

<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-image: url("https://img.freepik.com/free-photo/desk-stacked-with-books-studying-generated-by-ai_188544-29784.jpg?t=st=1701267777~exp=1701271377~hmac=38ea1385de5956d5b4032dff218cb53cc80c3592b77ae1f84a34e88bc83ed904&w=826");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    .card {
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
    }

    .blue-text {
        color: #00BCD4
    }

    .form-control-label {
        margin-bottom: 0
    }

    select,
    input,
    textarea,
    button {
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400
    }

    .btn-block {
        text-transform: uppercase;
        font-size: 15px !important;
        font-weight: 400;
        height: 43px;
        cursor: pointer
    }

    .btn-block:hover {
        color: #fff !important
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }
</style>

@section('title')
الباقات
@stop
@endsection
@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-12" style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 15px; padding-bottom: 15px;  border-radius:7px; display: flex; justify-content: space-around;">
            <h1 class="mb-0" style="color:#fff; font-size: 45px; "><img src="https://cdn-icons-png.flaticon.com/128/6192/6192115.png" width="60px" class="mr-3">قائمة الباقات المفعلة </h1>
        </div>
    </div>
</div>
<div class="page-title">
    <div class="row">
        <div class="col-sm-12"> <button type="button" class="btn btn-info float-left float-sm-right " data-toggle="modal" data-target="#exampleModal" style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;"><img src="https://cdn-icons-png.flaticon.com/128/8170/8170711.png" width="26px"> -
                اضافة باقة جديدة
            </button>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اضافة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <h5 class="text-center mb-4">بيانات الباقة الأساسية</h5>
                <form class="form-card" action="{{ route('postPackageBook') }}" method="POST">
                    @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">إسم
                                الباقة<span class="text-danger">
                                    *</span></label> <input type="text" id="fname" name="name" required onblur="validate(1)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">وصف
                                الباقة<span class="text-danger">
                                    *</span></label> <input type="text" id="ans" required name="description" placeholder="" onblur="validate(6)">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">سعر الباقة <span class="text-danger">
                                    *</span></label> <input type="text" id="fname" name="price" required onblur="validate(1)"> </div>

                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">المرحلة<span class="text-danger">
                                    *</span></label>
                            <select id="category" name="stage" required>
                                <option value="ابتدائي">ابتدائي</option>
                                <option value="متوسط">متوسط</option>
                                <option value="ثانوي">ثانوي</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">الصف<span class="text-danger">
                                    *</span></label>
                            <select id="item" name="class" required></select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">تاريخ إنتهاء الباقة<span class="text-danger">
                                    *</span></label> <input required type="date" id="job" name="expiry_date" placeholder="" onblur="validate(5)"> </div>


                    </div>
                    <div class="row justify-content-between">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <button type="submit" class="btn-block btn-primary">اضافة باقة جديدة</button>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <button type="button" class="btn-block btn-danger" data-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </form>
            </div>
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
        <div class="card card-statistics h-110">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0" style="text-align:center">
                        <thead>
                            <tr>
                                <th>إسم الباقة</th>
                                <th>الصف</th>
                                <th>سعر الباقة</th>
                                <th>تاريخ الانتهاء</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($package as $packet)
                            <tr>
                                <td>{{ $packet->name }}</td>
                                <td>{{ $packet->class }}</td>
                                <td>{{ $packet->price }}</td>
                                <td>{{ $packet->expiry_date }}</td>
                                <td>
                                    <!-- Button trigger modal update -->
                                    <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $packet->id }}">
                                            <i class="fa fa-pencil-square"></i>
                                        </button> -->
                                    <div class="modal fade" id="edit{{ $packet->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="container-fluid px-1 py-5 mx-auto">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                                                    <div class="card">
                                                        <h5 class="text-center mb-4">بيانات الباقة </h5>
                                                        <form class="form-card" action="{{ route('postPackage') }}" method="POST">
                                                            @csrf
                                                            <div class="row justify-content-between text-left">
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <label class="form-control-label px-3">إسم
                                                                        الباقة<span class="text-danger">
                                                                            *</span></label> <input type="text" id="fname" name="name" required value="{{ $packet->name }}" onblur="validate(1)">
                                                                </div>
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <label class="form-control-label px-3">وصف
                                                                        الباقة<span class="text-danger">
                                                                            *</span></label> <input type="text" id="ans" required name="description" value="{{ $packet->description }}" placeholder="" onblur="validate(6)">
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between text-left">
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <label class="form-control-label px-3">المرحلة<span class="text-danger">
                                                                            *</span></label>
                                                                    <select id="category" name="stage" required>
                                                                        <option value="ابتدائي">ابتدائي</option>
                                                                        <option value="متوسط">متوسط</option>
                                                                        <option value="ثانوي">ثانوي</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <label class="form-control-label px-3">الصف<span class="text-danger">
                                                                            *</span></label>
                                                                    <select id="item" name="class" required></select>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between text-left">
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <label class="form-control-label px-3">تاريخ
                                                                        إنتهاء الباقة<span class="text-danger">
                                                                            *</span></label> <input required type="date" id="job" value="{{ $packet->expiry_date }}" name="expiry_date" placeholder="" onblur="validate(5)">
                                                                </div>
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <label class="form-control-label px-3">نوع
                                                                        الباقة<span class="text-danger">
                                                                            *</span></label>
                                                                    <select required id="job" name="package_type">
                                                                        <option value="fullterm">ترم كامل</option>
                                                                        <option value="monthly">باقة شهرية</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between">
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <button type="submit" class="btn-block btn-primary">تعديل
                                                                        الباقة</button>
                                                                </div>
                                                                <div class="form-group col-sm-6 flex-column d-flex">
                                                                    <button type="button" class="btn-block btn-danger" data-dismiss="modal">اغلاق</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal delete -->
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
                                            data-target="#archivePackage{{ $packet->id }}">
                                            <i class="fa fa-archive"></i>
                                        </button>
                                        <div class="modal fade" id="archivePackage{{ $packet->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف الباقة</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('archivePackageBook', $packet->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h4> هل انت متاكد من ارشيف هذه الباقة ؟</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">اغلاق</button>
                                                            <button type="submit" class="btn btn-primary"> ارشف
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $packet->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a  href="{{ route('editPackageBook' ,$packet->id )}}" class="btn btn-info ">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                       
                                        
                                        <div class="modal fade" id="delete{{ $packet->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف الباقة</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('deletePackageBook', $packet->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h4> هل انت متاكد من حذف هذه الباقة ؟</h4>
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
<!-- row closed -->
@endsection
@section('js')

@endsection