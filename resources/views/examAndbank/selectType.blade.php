@extends('layouts.master')
@section('css')
    <style>
        .modal-body {
            display: flex;
            width: 80%;
            justify-content: space-around;
            align-items: center;
            align-self: auto;
        }

        .card {
            display: flex;
            width: 40%;
            height: 180px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            transition: 0.9s;
        }

        .card:hover {
            justify-content: space-between;
            transition: 0.9s;
        }

        .card h3 {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold
        }
    </style>
@section('title')
    اختيار
@stop
@endsection
@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-12"
            style="color:#dc3545 ;text-align:center; background-color: #dc3545; margin-bottom: 10px; border-radius:7px;">
            <h2 class="mb-0" style="color:#fff ;text-align:center; padding-top: 10px; padding-bottom: 10px; ">
                اختيار الترم </h2>
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

<div class="modal-body">
    <a href="{{ route('getExam') }}" class="card">
        <img src="https://cdn-icons-png.flaticon.com/128/2641/2641409.png" width="80px" />
        <h3>الاختبارات</h3>
    </a>
    <a href="#" class="card">
        <img src="https://cdn-icons-png.flaticon.com/128/2830/2830289.png" width="80px" />
        <h3>بنوك وحل الواجبات</h3>
    </a>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
