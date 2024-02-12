@extends('layouts.master')
@section('css')

@section('title')
    سلة المشتريات
@stop
@endsection
@section('page-header')
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #6a11cb;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgb(255, 255, 255), rgb(231, 231, 231));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgb(255, 255, 255), rgb(231, 231, 231))
    }
</style>

<div>
    <h2
        style="text-align: center; margin: 10px; background-color: #444; padding: 10px; color: #fff; border-radius: 5px;">
        سلة مشترياتك </h2>
</div>
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0"> محتوي السلة </h5>
                    </div>
                    <div class="card-body">
                        <!-- Single item -->
                        @foreach ($cart as $cart)
                            <div class="d-flex justify-contant-center flex-wrap  text-center">
                                @if ($cart->course != null)
                                    <div class="col-lg-3 col-sm-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="{{ asset('cartImage.jpeg') }}" width="140px"
                                                style="border-radius: 10px" alt="image" />
                                        </div>
                                        <!-- Image -->
                                    </div>
                                    <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong> اسم المادة : {{ $cart->course->subject_name }}</strong></p>
                                        <p>{{ $cart->course->classroom }}</p>
                                        <p class="text-start text-md-left pt-4">
                                            <strong> سعر المادة : {{ $cart->price }} د.ك</strong>
                                        </p>
                                        <!-- Data -->
                                    </div>
                                @else
                                    <div class="col-lg-3 col-sm-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="{{ asset('cartImage.jpeg') }}" width="140px"
                                                style="border-radius: 10px" alt="image" />
                                        </div>
                                        <!-- Image -->
                                    </div>
                                    <div class="col-lg-4 col-sm-12 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong>اسم الباقة : {{ $cart->package->name }}</strong></p>
                                        <strong> المواد </strong>:
                                        @foreach ($cart->package->course as $pack)
                                            <span>{{ $pack->subject_name }} </span>
                                            @if (!$loop->last)
                                                <span> - </span>
                                            @endif
                                        @endforeach
                                        <p>{{ $cart->package->class }}</p>
                                        <p class="text-start text-md-left pt-4">
                                            <strong> سعر الباقة : {{ $cart->price }} د.ك</strong>
                                        </p>
                                        <!-- Data -->
                                    </div>
                                @endif

                                <div class="col-lg-4 text-right col-sm-12 mb-4 mb-lg-0">
                                    <!-- Price -->

                                    <form action="{{ route('cartDelete', $cart->id) }}" method="post">
                                        @csrf
                                        <button type="submit" style="border: none ; background:none"
                                            data-mdb-toggle="tooltip" title="Remove item">
                                            <img src="https://cdn-icons-png.flaticon.com/128/6711/6711573.png"
                                                width="40px" />
                                        </button>
                                    </form>
                                    <!-- Price -->
                                </div>
                            </div>
                            <hr class="my-4" />
                        @endforeach
                        <!-- Single item -->
                    </div>
                </div>
              
            </div>
            <form class="col-md-4" action="{{ route('myFatoorahIndex') }}" method="GET">
                @csrf
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">ملخص</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                الكورسات
                                <span>{{ $sumPrice }}</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>المبلغ الإجمالي</strong>

                                </div>
                                <span><strong>الاجمالي : {{ $sumPrice }} د.ك</strong></span>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            اكمال عملية الشراء
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>

<!-- row closed -->
@endsection
@section('js')

@endsection