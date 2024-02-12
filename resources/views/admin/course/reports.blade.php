@extends('layouts.master')
@section('css')
@section('title')
التقارير
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->


<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-brand">حسابات الكورسات المسجلة</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="container mt-4">
    <!-- Report Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">التقارير</h5>
        </div>
        <div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-body bg-dark text-white">
                <h3 class="text-lg mb-3 text-white">إجمالى ارباح المنصة من الكورسات : {{$platformEarn}} د.ك</h3>
                <h3 class="text-lg mb-3 text-white"> إجمالى ارباح المعلمين من الكورسات : {{$price_all_teacher}} د.ك</h3>
                <h2 class="text-lg text-white">إجمالى مبيعات المنصة من الكورسات خلال الترم : {{$priceAll}} د.ك</h2>
            </div>
        </div>
    </div>
</div>

    </div>
</div>
<script>

</script>

<!-- row closed -->
@endsection
@section('js')

@endsection