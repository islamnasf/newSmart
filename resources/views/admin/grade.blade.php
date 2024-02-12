@extends('layouts.master')
@section('css')

@section('title')
    Grade
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> المراحل الدراسية</h4>
        </div>
        
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">            <div >
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;" ><i class="fa fa-graduation-cap"></i>  -
    اضافة مرحلة دراسية  
</button>
</div></li>
            </ol>
 
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
      <h5 class="modal-title" id="exampleModalLabel">اضافة مرحلة</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
    <div class="modal-body"> 
   
    <form action="{{url('grade')}}" method="post">
    @csrf
    <input type="text" name="name" class="form-control"   placeholder="اسم المرحلة ">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</br>
    <input type="text" name="notes" class="form-control"  placeholder="التفاصيل">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      <button type="submit" class="btn btn-primary">اضافة مرحلة </button>
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
                    <th>اسم المرحلة </th>
                    <th>تفاصيل</th>
                    <th>عمليات</th>
                </tr>
            </thead>
            <tbody>
            @foreach($grade as $grade)
                      <tr>
                        <td>{{$grade->name}}</td>
                        <td>{{$grade->notes}}</td>
                    <td>
                          <!-- Button trigger modal update -->
                          
                         
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$grade->id}}">
                            <i class="fa fa-edit"></i>
                          </button>
                                          <!--  edit Modal -->
<div class="modal fade" id="edit{{$grade->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">تعديل المرحلة</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
    <div class="modal-body"> 
   
    <form action="{{url('/grade/update',$grade->id)}}" method="post">
    @csrf
    <input type="text" name="name" class="form-control"   value="{{$grade->name}} " placeholder="اسم المرحلة" >
</br>
    <input type="text" name="notes" class="form-control"  value="{{$grade->notes}}" placeholder="التفاصيل">
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
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$grade->id}}">
                          <i class="fa fa-trash"></i>
                          </button>
<div class="modal fade" id="delete{{$grade->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">حذف المرحلة</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{url('/grade/delete',$grade->id)}}" method="post">                                                               
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
                        <!-- Button trigger modal show -->
                        <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show{{$grade->id}}">
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
