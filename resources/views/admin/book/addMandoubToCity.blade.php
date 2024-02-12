@extends('layouts.master')
@section('css')
@section('title')
مناديب المحافظة  
@stop
@endsection
@section('page-header')


<div class="page-title">
  <div class="row">
  <div class="col-sm-12" style="color:#dc3545 ; margin:10px auto; background-color: #dc3545; padding-top: 10px; padding-bottom: 10px;  border-radius:7px; display: flex; justify-content: space-around;" >
      <h2 class="mb-0" style="color:#fff ; " > مناديب المحافظة </h2>
            <button type="button" class="btn btn float-left float-sm-right " data-toggle="modal" data-target="#exampleModal" style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;"><i class="fa fa-user "></i> -
              اضافة مندوب جديد 
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
        <h5 class="modal-title" id="exampleModalLabel">اضافة المندوب</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('addNewMandoub',$c->id)}}" method="post">
          @csrf
          <div class="form-group  flex-column d-flex"> <label style="font-size: 20px;">
                                        اختر المندوب
                                          </label>
                                    <select class="form-control" type="text" id="lname" required name="mandoub_id"
                                        onblur="validate(2)">
                                        @foreach ($mandoubs as $mandoub)
                                            <option  value="{{ $mandoub->id }}">{{ $mandoub->name }}</option>
                                        @endforeach
                                    </select>
                                </div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary">اضافة مندوب   </button>
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
                <th>اسم المندوب </th>
                <th> العمليات</th>
              </tr>
            </thead>
            <tbody>
              @foreach($mandub as $mandub)
              <tr>
                <td>{{$mandub->name}}</td>       
                <td>
                  <!-- Button trigger modal update -->
                  <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-sliders" style="font-size: 20px;"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                    <div style="padding:2px; padding-right: 20px; font-size: 15px;">
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#delete{{$mandub->id}}">
                        <i class="fa fa-trash"></i>
                      </button>
                           حذف المندوب 
                    </div>
                  </div>
                  <!--delete Modal-->
                  <div class="modal fade" id="delete{{$mandub->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">حذف المرحلة</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{route('mandoubCityDelete',$mandub->id )}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <h4>هل انت متاكد من حذف المندوب  ؟</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary"> حذف </button>
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