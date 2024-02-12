@extends('layouts.master')
@section('css')
@section('title')
    الطلبة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@endsection
@section('content')

<div style="display: flex; flex-direction: column; max-height: 500vh; padding-bottom: 10px;">
    <div class="row">
        <img src="{{ url('assets/images/education.jpg') }}"
            style="width:95%;  display: block; margin:30px; object-fit: contain; border-radius: 10px;" alt="">
    </div>
    <h1 style="text-align: center;font-family: 'Courier New', Courier, monospace;font-weight: bolder">قائمة إشتراكاتك
    </h1>
    <div style="display: flex; justify-content: space-evenly;width: 85%;align-self: center;flex-wrap: wrap;  max-height: 500vh;">
        @foreach ($user as $item)
            <div   style="display: flex;flex-direction: row;justify-content: space-around ;padding: 10px; background-color:#175166; margin-top: 10px;">
                <a href="{{ route('showTutorial', $item->id) }}" class="card" style="width: 18rem;">
                    <div class="card-body" style="display: flex ; flex-direction: column;justify-content: space-around ;background-color:#175166;" >
                        <h5 style="text-align: center; color:#fff" class="card-title">{{ $item->subject_name }}</h5>
                        <p style="margin: 10px;text-align: center;  color:#fff" class="card-text">{{ $item->techer->name }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
@section('js')

@endsection
