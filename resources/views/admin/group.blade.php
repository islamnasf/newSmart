@extends('layouts.master')
@section('css')

@section('title')
    group
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الصفوف الدراسية</h4>
        </div>
        
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">            <div >
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" style="font-size: 18px; font-family:Amiri;
            line-height: 1.2;" ><i class="fa fa-graduation-cap"></i>  -
    اضافة صف دراسي  
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
      <h5 class="modal-title" id="exampleModalLabel">اضافة صف </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
    <div class="modal-body"> 
   
    <form action="{{url('/group')}}"  method="post">
    @csrf
    <input type="text" name="group_name" class="form-control"   placeholder="اسم الصف  ">
</br>
    <input type="text" name="details" class="form-control"  placeholder="التفاصيل">
    <label> المرحلة  </label>
            <div class="input-group">
              <select class="form-select form-control" aria-label=".form-select-lg example" style=' margin:0px auto;' name="grade_id">
                 <option selected >اختر المرحلة  ... </option>
                  @foreach($grades as $grade)
                   <option value="{{$grade->id}}">{{$grade->name}}</option>
                  @endforeach
              </select>
            </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      <button type="submit" class="btn btn-primary">اضافة صف  </button>
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
                    <th>اسم الصف  </th>
                    <th>اسم المرحلة</th>
                    <th>تفاصيل</th>
                    <th>عمليات</th>

                </tr>
            </thead>
            <tbody>
            @foreach($group as $group)
                      <tr>
                        <td>{{$group->group_name}}</td>
                        <td>{{$group->grades->name}}</td>
                        <td>{{$group->details}}</td>

                    <td>
                          <!-- Button trigger modal update -->
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$group->id}}">
                            <i class="fa fa-edit"></i>
                          </button>
                                          <!--  edit Modal -->
<div class="modal fade" id="edit{{$group->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">تعديل الصف </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    
    <div class="modal-body"> 
   
    <form action="{{url('/group/update',$group->id)}}" method="post">
    @csrf
    <input type="text" name="group_name" class="form-control"   value="{{$group->group_name}} " placeholder="اسم الصف" >
</br>
    <input type="text" name="details" class="form-control"  value="{{$group->details}}" placeholder="التفاصيل">
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
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$group->id}}">
                          <i class="fa fa-trash"></i>
                          </button>
<div class="modal fade" id="delete{{$group->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" >
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">حذف الصف</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="{{url('/group/delete',$group->id)}}" method="post">                                                               
                              @csrf
    <div class="modal-body"> 
 هل انت متاكد من حذف هذه الصف  ؟
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
                        <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#show{{$group->id}}">
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
<!-- independent select -->
 <!-- <form>
        <label for="category">Category:</label>
        <select id="category" name="category">
          <option value="fruits">Fruits</option>
            <option value="vegetables">Vegetables</option>
            <option value="grade1">grade1</option>
            <option value="grade2">grade2</option>
        </select>

        <label for="item">Item:</label>
        <select id="item" name="item"></select>
    </form>

    <script>
        // Sample data for items based on categories
        const items = {
            grade1: ['group1', 'group2', 'group3'],
            grade2: ['group4', 'group5', 'group6']
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
    </script>  -->



@endsection


@section('js')

@endsection
