@extends('layouts.master')
@section('css')
@section('title')
المخزن الرئيسي
@stop
@endsection
@section('page-header')
<style>
    .link9h4 {
        font-size: 25px;
        color: #555;
    }

    .link9 {

        width: 5.55%;
    }

    .goal {
        align-items: center;
    }

    @media only screen and (max-width: 1300px) {
        .goal {
            width: 100%;
        }
    }

    @media only screen and (max-width: 600px) {
        .link9 {
            width: 10.11%;
        }

        .link9h4 {
            font-size: 20px;
            color: #555;
        }

        .goal {
            width: 100%;
            align-items: center;
        }
    }
</style>


<div class="page-title">
    <div class="row">
        <div class="col-sm-12" style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 10px; padding-bottom: 10px;  border-radius:7px; display: flex; justify-content: space-around;">

            <h1 class="mb-0" style="color:#fff ; "> <span class="text-danger">
                    <i class=" fa fa-home highlight-icon" aria-hidden="true" style="color:#fff; font-size:45px;  "></i>
                </span>المخزن الرئيسي </h1>

        </div>
    </div>

</div>
<div class="text-center" style="width:50% ;margin:0px auto ">
    <h4 class="link9h4"> اختر الصف الدراسي </h4>
</div>

<div class="row" style="width: 100%; margin: 15px auto; display: flex; justify-content: center;">
    <a href="{{route('booksShow','four')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840753.png" width="100%" class="pl-1 image" alt="Icon 1"></a>
    <a href="{{route('booksShow','five')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840754.png" width="100%" class="pl-1 image" alt="Icon 2"></a>
    <a href="{{route('booksShow','six')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840755.png" width="100%" class="pl-1 image" alt="Icon 3"></a>
    <a href="{{route('booksShow','seven')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840771.png" width="100%" class="pl-1 image" alt="Icon 4"></a>
    <a href="{{route('booksShow','eight')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840772.png" width="100%" class="pl-1 image" alt="Icon 5"></a>
    <a href="{{route('booksShow','nine')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840773.png" width="100%" class="pl-1 image" alt="Icon 6"></a>
    <a href="{{route('booksShow','ten')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/6912/6912885.png" width="100%" class="pl-1 image" alt="Icon 7"></a>
    <a href="{{route('booksShow','eleven')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/6912/6912910.png" width="100%" class="pl-1 image" alt="Icon 8"></a>
    <a href="{{route('booksShow','twelve')}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/6912/6912921.png" width="100%" class="pl-1 image" alt="Icon 9"></a>
</div>
@php
$name = request()->route('name');
@endphp

@if ($name >= 'four' && $name <= 'twelve' ||$name=='eight' ||$name=='five' ||$name=='eleven' ) <div class="text-center goal ">
    <button style="background-color: #175166; border: none;border-radius: 5px; margin: 3px;" type="button" data-toggle="modal" data-target="#target">
        <h4 style="background-color: #175166; padding: 10px 10px 0px 10px ;  color: #fff; font-size: 30px;"> <img src="https://cdn-icons-png.flaticon.com/128/4127/4127795.png" width="27px"> المستهدف </h4>
    </button>
    <!-- <button style="background-color: #175166; border: none;border-radius: 5px; margin: 3px;" type="button" data-toggle="modal" data-target="#addquantity">
        <h4 style="background-color: #175166; padding: 10px 10px 0px 10px ;  color: #fff; font-size: 30px;"> <img src="https://cdn-icons-png.flaticon.com/128/13783/13783803.png" width="32px"> الكمية </h4>
    </button> -->
    <button style="background-color: #175166; border: none;border-radius: 5px; margin: 3px;" type="button" data-toggle="modal" data-target="#addpirnt">
        <h4 style="background-color: #175166; padding: 10px 10px 0px 10px ;  color: #fff; font-size: 30px;"> <img src="https://cdn-icons-png.flaticon.com/128/839/839184.png" width="27px"> الطباعة </h4>
    </button>
    </div>
    @endif
    <div class="modal fade" id="target" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">المستهدف </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('postTarget')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel"> اختر من هذه المواد </h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">اختيار</th>
                                    <th scope="col">اسم المذكرة</th>
                                    <th scope="col">الكمية الحالية</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <label class="form-check">
                                            <input type="checkbox" name="selected_subjects[]" value="{{ $book->id }}" class="form-check-input">
                                        </label>
                                    </td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->quantity }}</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد مذكرات متاحة حالياً.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>


                        <div class="form-group mt-3">
                            <label for="quantity" class="form-label" style="font-size: 15px; font-weight: bold;">المستهدف</label>
                            <input type="number" name="target" id="quantity" class="form-control" required placeholder="اضع هنا الكمية المرادة ">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addquantity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">الكمية </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('postQuantityClassroom')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel"> اختر من هذه المواد </h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">اختيار</th>
                                    <th scope="col">اسم المذكرة</th>
                                    <th scope="col">الكمية الحالية</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <label class="form-check">
                                            <input type="checkbox" name="selected_subjects[]" value="{{ $book->id }}" class="form-check-input">
                                        </label>
                                    </td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->quantity }}</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد مذكرات متاحة حالياً.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>


                        <div class="form-group mt-3">
                            <label for="quantity" class="form-label" style="font-size: 15px; font-weight: bold;">اضافة كمية جديدة </label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required placeholder="اضع هنا الكمية المضافة ">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addpirnt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">الطباعة </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('finishPrint')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="exampleModalLabel"> اختر من هذه المواد </h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">اختيار</th>
                                    <th scope="col">اسم المذكرة</th>
                                    <th scope="col">الكمية المراد طباعتها</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <label class="form-check">
                                            <input type="checkbox" name="selected_subjects[]" value="{{ $book->id }}" class="form-check-input">
                                        </label>
                                    </td>
                                    <td>{{ $book->name }}</td>
                                    <td>
                                        @if($book->target)
                                        <form id="quantityForm" action="{{ route('updatePrintQuantity', $book->id) }}" method="post">
                                            @csrf
                                            <input type="number" name="print_quantity[]" id="inputPrintQuantity_{{ $book->id }}" value="{{  $book->target->print }}" class="form-control" oninput="updatePrintQuantity(this)">
                                        </form>

                                        @else
                                        <input type="number" name="print_quantity[]" id="inputPrintQuantity_{{ $book->id }}" value="0" class="form-control">
                                        @endif
                                    </td>



                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد مذكرات متاحة حالياً.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>





                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">تم الطباعة</button>
                    </div>

                </form>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function updatePrintQuantity(input) {
        var bookId = input.id.replace('inputPrintQuantity_', '');
        var newPrintQuantity = input.value;

        // التحقق من أن القيمة المحددة أقل من أو تساوي target قبل إرسال الطلب
        if (newPrintQuantity <= '{{ $book->target }}') {
            $.ajax({
                url: '/dashboard/update_print_quantity/' + bookId,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    print_quantity: newPrintQuantity
                },
                dataType: 'json',
                success: function(response) {
                    console.log('تم تحديث كمية الطباعة بنجاح.');
                    input.value = newPrintQuantity;
                },
                error: function(error) {
                    console.error('حدث خطأ: ', error);
                }
            });
        } else {
            console.log('تم تحديث القيمة في واجهة المستخدم دون تحديث قاعدة البيانات.');
        }
    }
</script>


              
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
                                    <th>الكمية</th>
                                    <th>المستهدف</th>
                                    <th>الطباعة </th>
                                    <th> العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->classroom}}</td>
                                    <td>{{$book->quantity}}</td>

                                    <td>
                                        @if($book->target)
                                        {{$book->target->target}}
                                        @else
                                        {{$book->quantity}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($book->target)
                                        {{$book->target->print}}
                                        @else
                                        0 @endif
                                    </td>
                                    <td>
                                        <!-- Button trigger modal update -->
                                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-sliders" style="font-size: 20px;"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                                            <!-- <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$book->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                اضافة كمية
                                            </div> -->
                                            <a href="{{route('printBookFinish',$book->id)}}" style="padding:2px; padding-right: 20px; font-size: 15px; display: block; ">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                تم الطباعة
                                            </a>
                                            <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $book->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                حذف الكتاب
                                            </div>
                                        </div>

                                        <!-- edit  -->
                                        <div class="modal fade" id="edit{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> اضافة كمية </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-2">
                                                            <div class="alert alert-success" role="alert" style="font-size: 16px;">
                                                                يرجى إدخال الكمية المراد إضافتها على المخزون
                                                                <i class="fa fa-exclamation mr-3"></i>
                                                            </div>
                                                        </div>
                                                        <form action="{{route('addQuantity',$book->id)}}" method="post">
                                                            @csrf
                                                            <label style="font-size: 15px; font-weight: bold;"> الكمية الجديدة المضافة </label>
                                                            <input type="number" name="quantity" class="form-control" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary"> اضافة </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete -->
                                        <div class="modal fade" id="delete{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">حذف الكتاب </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{ route('deleteBookFromStore', $book->id) }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h4> هل انت متاكد من حذف هذا الكتاب ؟</h4>
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