@extends('layouts.master')
@section('css')
@section('title')
مخزن المندوب
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
            <h2 class="mb-0" style="color:#fff ; "> <i class="fa fa-home"></i> مخزن المندوب </h2>

        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-1" class="control-label">إسم المندوب</label>
            <input type="text" value="{{$mandub->name}} " class="form-control" disabled="">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-1" class="control-label">رقم الهاتف</label>
            <input type="text" value="{{$mandub->phone}}" class="form-control" disabled="">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="field-1" class="control-label">الرقم السري</label>
            <input type="text" value="{{$mandub->user_password}}" class="form-control" disabled="">
        </div>
    </div>


</div>
<div class="text-center" style="width:50% ;margin:0px auto ">
    <h4 class="link9h4"> اختر الصف الدراسي </h4>
</div>

<div class="row" style="width: 100%; margin: 15px auto; display: flex; justify-content: center;">
    <a href="{{route('booksMandubShow',['four',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840753.png" width="100%" class="pl-1 image" alt="Icon 1"></a>
    <a href="{{route('booksMandubShow',['five',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840754.png" width="100%" class="pl-1 image" alt="Icon 2"></a>
    <a href="{{route('booksMandubShow',['six',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840755.png" width="100%" class="pl-1 image" alt="Icon 3"></a>
    <a href="{{route('booksMandubShow',['seven',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840771.png" width="100%" class="pl-1 image" alt="Icon 4"></a>
    <a href="{{route('booksMandubShow',['eight',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840772.png" width="100%" class="pl-1 image" alt="Icon 5"></a>
    <a href="{{route('booksMandubShow',['nine',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/3840/3840773.png" width="100%" class="pl-1 image" alt="Icon 6"></a>
    <a href="{{route('booksMandubShow',['ten',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/6912/6912885.png" width="100%" class="pl-1 image" alt="Icon 7"></a>
    <a href="{{route('booksMandubShow',['eleven',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/6912/6912910.png" width="100%" class="pl-1 image" alt="Icon 8"></a>
    <a href="{{route('booksMandubShow',['twelve',$mandub->id])}}" class="link9"><img src="https://cdn-icons-png.flaticon.com/128/6912/6912921.png" width="100%" class="pl-1 image" alt="Icon 9"></a>
</div>
@php
$name = request()->route('name');
@endphp

@if ($name >= 'four' && $name <= 'twelve' ||$name=='eight' ||$name=='five' ||$name=='eleven' ) <div class="text-center goal ">
    <button style="background-color: #175166; border: none;border-radius: 5px; margin: 3px;" type="button" data-toggle="modal" data-target="#station{{$mandub->id}}">
        <h4 style="background-color: #175166; padding: 10px 10px 0px 10px ;  color: #fff; font-size: 30px;"> <img src="https://cdn-icons-png.flaticon.com/128/4127/4127795.png" width="27px"> المستهدف </h4>
    </button>
    <button style="background-color: #175166; border: none;border-radius: 5px; margin: 3px;" type="button" data-toggle="modal" data-target="#transport{{$mandub->id}}">
        <h4 style="background-color: #175166; padding: 10px 10px 0px 10px ;  color: #fff; font-size: 30px;"> <img src="https://cdn-icons-png.flaticon.com/128/7322/7322732.png" width="27px"> التوريد </h4>
    </button>
    </div>

    @endif
    <div class="modal fade" id="station{{$mandub->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">المستهدف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('postStation' ,$mandub->id)}}" method="post">
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
                                    <th scope="col">مخزن المندوب</th>

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

                                    <td>
                                        @php

                                        $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                        $mandubQuantity = optional($book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first())->pivot->mandub_quantity ?? 0;
                                        $backgroundClass = $mandubQuantity < 2 ? 'bg-danger' : 'bg-success' ; @endphp <span class="{{ $backgroundClass }}" style="padding: 8px; border-radius: 3px; color: #fff;">
                                            {{ $mandubQuantity }}
                                            </span> <br>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">لا توجد مذكرات متاحة حالياً.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>


                        <div class="form-group mt-3">
                            <label for="mandub_target" class="form-label" style="font-size: 15px; font-weight: bold;">المستهدف</label>
                            <input type="number" name="mandub_target" id="mandub_target" class="form-control" required placeholder="اضع هنا الكمية المرادة ">
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
    <!-- التوريد -->
    <div class="modal fade" id="transport{{$mandub->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">التوريد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('finishStation')}}" method="post">
                @csrf
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel"> اختر من هذه المواد </h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اختيار</th>
                                <th scope="col">اسم المذكرة</th>
                                <th scope="col">الكمية المراد توريدها </th>
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
                                    @php
                                    $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                    $mandubStation = optional($mandubBook)->pivot->station ?? 0;
                                    @endphp

                                    @if($mandubBook)
                                    <form id="quantityForm_{{ $mandub->id }}" action="{{ route('update_station_quantity', [$book->id, $mandub->id]) }}" method="post">
                                        @csrf
                                        <input type="number" name="station_quantity[]" id="inputStationQuantity_{{ $mandub->id }}" value="{{ $mandubStation }}" class="form-control" data-book-id="{{ $book->id }}" data-mandub-id="{{ $mandub->id }}" data-mandub-quantity="{{ $mandubBook->pivot->mandub_target }}" oninput="updateStationQuantity(this)">
                                    </form>
                                    @else
                                    <input type="number" name="station_quantity[]" id="inputStationQuantity_{{ $mandub->id }}" value="{{ $mandubStation }}" class="form-control">
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
                    <button type="submit" class="btn btn-primary">تم التوريد</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function updateStationQuantity(input) {
        var newStationQuantity = input.value;
        var bookId = input.getAttribute('data-book-id');
        var mandubId = input.getAttribute('data-mandub-id');

        if (newStationQuantity !== '') {
            $.ajax({
                url: '/dashboard/update_station_quantity/' + bookId + '/' + mandubId,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    station_quantity: newStationQuantity
                },
                dataType: 'json',
                success: function(response) {
                    console.log('تم تحديث الكمية بنجاح.');
                    input.value = newStationQuantity;
                },
                error: function(error) {
                    console.error('حدث خطأ: ', error);
                }
            });
        } else {
            console.log('يرجى إدخال قيمة للكمية.');
        }
    }
</script>





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
                                    <th>المذكرة </th>
                                    <th>الصف </th>
                                    <th> كمية المخزن الرئيسي </th>
                                    <th> مخزن المندوب </th>
                                    <th>المستهدف</th>
                                    <th> توريد </th>
                                    <th> الموزع </th>
                                    <th> المندوب </th>
                                    <th>الحد الادني</th>
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
                                        @php

                                        $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                        $mandubQuantity = optional($book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first())->pivot->mandub_quantity ?? 0;
                                        $backgroundClass = $mandubQuantity < 2 ? 'bg-danger' : 'bg-success' ; @endphp <span class="{{ $backgroundClass }}" style="padding: 8px; border-radius: 3px; color: #fff;">
                                            {{ $mandubQuantity }}
                                            </span> <br>
                                    </td>
                                    <th>
                                        @php

                                        $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                        $mandub_target = optional($book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first())->pivot->mandub_target ?? 0;
                                        $backgroundClass = $mandub_target < 2 ? 'bg-success' : 'bg-danger' ; @endphp <span class="{{ $backgroundClass }}" style="padding: 8px; border-radius: 3px; color: #fff;">
                                            {{ $mandub_target }}
                                    </th>
                                    <th>
                                        @php

                                        $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                        $station = optional($book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first())->pivot->station ?? 0;
                                        $backgroundClass = $station < 2 ? 'bg-success' : 'bg-danger' ; @endphp <span class="{{ $backgroundClass }}" style="padding: 8px; border-radius: 3px; color: #fff;">
                                            {{ $station }}
                                    </th>
                                    <th>
                                        @php

                                        $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                        $distributor_active = optional($book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first())->pivot->distributor_active ?? "✗";
                                        $backgroundClass = $distributor_active == 1 ? 'bg-success' : 'bg-danger' ; @endphp <span class="{{ $backgroundClass }}" style="padding: 8px; border-radius: 3px; color: #fff;">
                                            @if($distributor_active == 0)
                                            <a href="{{route('updateDistributorActive',[$book->id,$mandub->id])}}"> ✓ </a>
                                            @else
                                            ✗
                                            @endif
                                    </th>
                                    <th>
                                        @php

                                        $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                        $mandub_active = optional($book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first())->pivot->mandub_active ?? "✗";
                                        $backgroundClass = $mandub_active == 1 ? 'bg-success' : 'bg-danger' ; @endphp <span class="{{ $backgroundClass }}" style="padding: 8px; border-radius: 3px; color: #fff;">
                                            @if($mandub_active == 0)
                                            <a href="{{route('updateMandubActive',[$book->id,$mandub->id])}}"> ✓ </a>
                                            @else
                                            ✗
                                            @endif
                                    </th>
                                    <td>
                                        @php
                                        $mandubBook = $book->mandubBooks->where('pivot.mandub_id', $mandub->id)->first();
                                        @endphp

                                        {{ $mandubBook ? $mandubBook->pivot->minimum : 2 }}
                                        <br>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal update -->
                                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-sliders" style="font-size: 20px;"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-center dropdown-big dropdown-notifications">
                                            <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#confirt{{$book->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                تحويل من المخزن الرئيسي
                                            </div>
                                            <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editquantity{{$book->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                اضافة كمية
                                            </div>
                                            <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editminimum{{$book->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                تعديل الحد الادني
                                            </div>

                                        </div>
                                        <!--edit Modal-->

                                        <div class="modal fade" id="confirt{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> تحويل من المخزن الرئيسي </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-2">
                                                            <div class="alert alert-success" role="alert" style="font-size: 16px;">
                                                                يرجى إدخال الكمية المراد تحويلها الي المندوب
                                                                <i class="fa fa-exclamation mr-3"></i>
                                                            </div>
                                                        </div>
                                                        <form action="{{route('postMandubQuantity',[$mandub->id,$book->id])}}" method="post">
                                                            @csrf
                                                            <label style="font-size: 15px; font-weight: bold;"> الكمية المراد تحويلها </label>
                                                            <input type="number" name="station" class="form-control" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary"> حفظ </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- edit  -->
                                        <div class="modal fade" id="editquantity{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <!-- edit  -->
                                        <div class="modal fade" id="editminimum{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                يرجى إدخال الحد الادني للمندوب
                                                                <i class="fa fa-exclamation mr-3"></i>
                                                            </div>
                                                        </div>
                                                        <form action="{{route('addMinimum',[$mandub->id,$book->id])}}" method="post">
                                                            @csrf
                                                            <label style="font-size: 15px; font-weight: bold;"> الحد الادني للمندوب </label>
                                                            <input type="number" name="minimum" class="form-control" required value="2">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-primary"> اضافة </button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal delete -->
                                        <!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">
                  <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">حذف المرحلة</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="#" method="post">
                          @csrf
                          <div class="modal-body">
                            هل انت متاكد من حذف هذه المرحلة ؟
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary"> حذف </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                 Button trigger modal show -->
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