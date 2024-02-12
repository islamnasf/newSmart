@extends('layouts.master')
@section('css')
@section('title')
    الملف الشخصي
@stop
@endsection
@section('page-header')
<div class="row">
    <div>
        <h2 style="position: absolute; left:10%; top:15%; color:#dc3545"> البيانات الشخصية </h2>
    </div>
    <!-- breadcrumb -->
    <img src="../assets/images/teacher.jpg"
        style="width:92%; height:180px;  display: block; margin:15px auto; margin-top:0px; object-fit: fill; border-radius: 5px;"
        alt="">
</div>
<div class="page-title">
    <div class="row">
        <div class="col-sm-12"
            style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin-bottom: 10px; border-radius:7px;">
            <h2 class="mb-0" style="color:#fff ;text-align:center; padding-top: 10px; padding-bottom: 10px; "> تعديل
                البيانات الشخصية </h2>
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
<div class="modal-body" style=" background-color:#175166; padding: 30px; border-radius: 10px;">
    <form action="{{ route('updateProfile', Auth()->user()->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                <label style="color:#fff; font-size: 25px; margin-right: 10px;">الاسم</label>
                <input type="text" name="name" class="form-control" value="{{ Auth()->user()->name }}"
                    style=" border-radius: 10px;">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                <label style="color:#fff; font-size: 25px; margin-right: 10px;">رقم التلفون</label>
                <input type="text" name="phone" class="form-control" value="{{ Auth()->user()->phone }}"
                    style=" border-radius: 10px;">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                <label style="color:#fff; font-size: 25px; margin-right: 10px;">الايميل</label>
                <input type="email" name="email" class="form-control" value="{{ Auth()->user()->email }}"
                    style=" border-radius: 10px;">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                <label style="color:#fff; font-size: 25px; margin-right: 10px;">الرقم السري</label>
                <input type="text" name="password" class="form-control" value="{{ Auth()->user()->user_password }}"
                    style=" border-radius: 10px;">
            </div>
        </div>
        <div class="page-title" class="col-sm-12">
            <div class="row">
                <button type="submit"
                    style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin:0px auto; border-radius:7px;">
                    <h4 class="mb-0"
                        style="color:#fff ;text-align:center;padding: 50px; padding-top: 10px; padding-bottom: 10px;  ">
                        تعديل البيانات الشخصية </h4>
                </button>
            </div>
        </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
