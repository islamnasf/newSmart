@extends('layouts.master')
@section('css')

@section('title')
    اعدادات المنصة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

<div class="container mt-5" style="margin-bottom: 30px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">التحكم فى محتوى</h5>
                </div>
                <div class="card-body">
                    <!-- Bootstrap Input Form -->
                    <form method="POST" action="{{ route('sitesettingsPost') }}">
                        @csrf
                        <!-- Text Input Field -->
                        <div class="form-group">
                            <label for="firstName">محتوي الرسالة المتحركة</label>
                            <input type="text" name="head_name" value="{{ $data->head_name }}" class="form-control"
                                id="firstName" placeholder="محتوي الرسالة المتحركة">
                        </div>
                        <div class="form-group">
                            <label for="firstName">محتوي الموضوع الاول</label>
                            <input type="text" name="content1" value="{{ $data->content1 }}" class="form-control"
                                id="firstName" placeholder="محتوي الموضوع الاول">
                        </div>
                        <div class="form-group">
                            <label for="firstName">محتوي الموضوع الثاني</label>
                            <input type="text" name="content2" value="{{ $data->content2 }}" class="form-control"
                                id="firstName" placeholder="محتوي الموضوع الثاني">
                        </div>
                        <div class="form-group">
                            <label for="firstName">محتوي الموضوع الثالث</label>
                            <input type="text" name="content3" value="{{ $data->content3 }}" class="form-control"
                                id="firstName" placeholder="محتوي الموضوع الثالث">
                        </div>
                        <div class="form-group">
                            <label for="firstName">محتوي الموضوع الرابع</label>
                            <input type="text" name="content4" value="{{ $data->content4 }}" class="form-control"
                                id="firstName" placeholder="محتوي الموضوع الرابع">
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5" style="margin-bottom: 30px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">التحكم فى محتوى footer</h5>
                </div>
                <div class="card-body">
                    <!-- Bootstrap Input Form -->
                    <form method="POST" action="{{ route('sitesettingsPost') }}">
                        @csrf
                        <!-- Text Input Field -->
                        <div class="form-group">
                            <label for="firstName">FB Link</label>
                            <input type="url" class="form-control" name="fb" value="{{ $data->fb }}"
                                id="firstName" placeholder="Link">
                        </div>
                        <div class="form-group">
                            <label for="firstName">FB Instagram</label>
                            <input type="url" class="form-control" name="insta" value="{{ $data->insta }}"
                                id="firstName" placeholder="Link">
                        </div>
                        <div class="form-group">
                            <label for="firstName">FB Twitter</label>
                            <input type="url" class="form-control" name="twitter" value="{{ $data->twitter }}"
                                id="firstName" placeholder="Link">
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')

@endsection
