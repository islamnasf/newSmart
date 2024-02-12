@extends('layouts.master')
@section('css')

@section('title')
المعلمين
@stop
@endsection
@section('page-header')
<div class="row">
  <div>
    <h2 style="position: absolute; left:10%; top:10%; color:#dc3545"> اجمالي عدد المعلمين ({{$count}})</h2>
  </div>
  <!-- breadcrumb -->
  <img src="{{url('assets/images/teacher.jpg')}}"
    style="width:92%; height:180px;  display: block; margin:15px auto; margin-top:0px; object-fit: fill; border-radius: 5px;"
    alt="">
</div>

<div class="page-title">
  <div class="row">
  <div class="col-sm-12" style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 10px; padding-bottom: 10px;  border-radius:7px; display: flex; justify-content: space-around;" >
      <h2 class="mb-0" style="color:#fff ; " > المعلمين</h2>
            <button type="button" class="btn btn-info float-left float-sm-right " data-toggle="modal" data-target="#exampleModal" style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;"><i class="fa fa-user"></i> -
              اضافة معلم جديد
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
        <h5 class="modal-title" id="exampleModalLabel">اضافة معلم</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('postTeacher')}}" method="post">
          @csrf
          <input type="text" name="name" class="form-control" placeholder="اسم المعلم ">
          @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </br>
          <input type="text" name="phone" class="form-control" placeholder=" رقم هاتف المعلم">
          @error('phone')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </br>
          <input type="text" name="teacher_description" class="form-control" placeholder="نبذه عن المعلم">
          </br>
          <input type="text" name="password" class="form-control" placeholder="الرقم السري">
</br>
          <input type="text" name="Teacher_ratio_course" class="form-control" placeholder="  نسبة المعلم من الكورسات ">

@error('Teacher_ratio_course')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary">اضافة المعلم </button>
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
                <th>اسم المعلم </th>
                <th>الهاتف </th>
                <th>الرقم السري</th>
                <th> نسبة المعلم  </th>
                <th>نبذه عن المعلم</th>
                <th> العمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach($teachers as $teacher)

              <tr>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->phone}}</td>
                <td>{{$teacher->user_password}}</td>
                <td>{{$teacher->Teacher_ratio_course}}</td>
                <td>{{$teacher->teacher_description}}</td>

                <td>
                  <!-- Button trigger modal update -->
                  <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-sliders" style="font-size: 20px;"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                    <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#edit{{$teacher->id}}">
                        <i class="fa fa-edit"></i>
                      </button>
                      تعديل البيانات
                    </div>
                  </div>



                  <!--  edit Modal -->
                  <div class="modal fade" id="edit{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">

                          <form action="{{route('updateTeacher',$teacher->id)}}" method="post">
                            @csrf
                            <label style="font-size: 15px; font-weight: bold;"> اسم المعلم  </label>
                            <input type="text" name="name" class="form-control" value="{{$teacher->name}}">
                            </br>
                            <label style="font-size: 15px; font-weight: bold;"> رقم الهاتف    </label>
                            <input type="text" name="phone" class="form-control" value="{{ $teacher->phone}}">
                            </br>
                            </br>
                            <label style="font-size: 15px; font-weight: bold;"> نبذه عن المعلم     </label>
                            <input type="text" name="teacher_description" class="form-control" value="{{ $teacher->teacher_description}}">
                            </br>

                            <label style="font-size: 15px; font-weight: bold;"> الرقم السري   </label>
                            <input type="text" name="password" class="form-control" value="{{ $teacher->user_password}}">
                            <label style="font-size: 15px; font-weight: bold;">نسبة المعلم من الكورسات </label>
                            <input type="text" name="Teacher_ratio_course" class="form-control" value="{{ $teacher->Teacher_ratio_course}}">

                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                          <button type="submit" class="btn btn-primary"> تعديل </button>
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