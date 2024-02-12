@section('title')
الصفحة الرئيسية
@stop
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')

    <style>
        .title {
            background-color: #dc3545;
            padding: 10px 0px 10px 0px;
            opacity: .9;
            color: #fff;
        }






        .subjectCard {
            width: 300px;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            align-items: center;
            background-color: #175166;
            border-radius: 5px;
            margin: 1px;
            position: relative;
            overflow: hidden;
            transition: .5s;
        }

        .subjectCard:hover {
            transition: .5s;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .buttonhover {
            background-color: transparent;
            border: 0px;
            width: 100%;
        }

        .buttonhover:hover {
            background-color: #175166;

            border-radius: 3px;

        }

        .buttonhover:hover h6 {
            color: #fff;
        }

        .headone:hover {
            background-color: #175166;
            opacity: .9;

        }

        .back11 {
            width: 95%
        }

        @media only screen and (max-width: 600px) {
            .back11 {
                width: 82%
            }
        }
    </style>

</head>

<body>

    <div class="wrapper">

        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper ">
            <div class="row ">
                <img src="{{ asset('assets/images/education.jpg') }}" class="back11" style=" display: block; margin:30px; object-fit: contain; border-radius: 10px;" alt="">
            </div>
            <!-- widgets -->
            @if (auth()->user()->user_type == 'admin')
            <!-- widgets -->

            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="{{ route('getStudent') }}">
                                            <i class=" fa fa-graduation-cap highlight-icon" aria-hidden="true" style="color:#175166; font-size:70px; padding-top:15px;padding-bottom:15px"></i>
                                        </a>
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('getStudent') }}">
                                        <p class="card-text text-dark" style="font-size: 27px; padding-top:15px ;">
                                            الطلبة
                                    </a>
                                    </p>
                                    <h4>{{ $studentCount }}</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="{{ route('getTeacher') }}">
                                            <i class=" fa fa-id-card highlight-icon" aria-hidden="true" style="color:#175166; font-size:70px; padding-top:15px;padding-bottom:15px  "></i>
                                        </a>
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('getTeacher') }}">
                                        <p class="card-text text-dark" style="font-size: 27px; padding-top:15px ;">
                                            المعلمين</p>
                                    </a>
                                    <h4>{{ $teacherCount }}</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <i class=" fa fa-stop-circle highlight-icon" aria-hidden="true" style="color:#175166; font-size:70px; padding-top:15px;padding-bottom:15px "></i>
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('course') }}">
                                        <p class="card-text text-dark" style="font-size: 27px; padding-top:15px ;">
                                            الكورسات</p>
                                    </a>
                                    <h4>{{ $courses }}</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="{{ route('selectTerm') }}">
                                            <i class=" fa fa-check-square-o  highlight-icon" aria-hidden="true" style="color:#175166; font-size:70px; padding-top:15px; padding-bottom:15px  "></i>
                                        </a>
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('getExam') }}">
                                        <p class="card-text text-dark" style="font-size: 27px; padding-top:15px ;">
                                            الاختبارات</p>
                                    </a>
                                    <h4>{{ $examCount }}</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- widgets -->

            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <img src="https://cdn-icons-png.flaticon.com/128/5832/5832416.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('getBook') }}">
                                        <p class="card-text text-dark" style="font-size: 27px; padding-top:25px ;">
                                            المذكرات
                                        </p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <img src="https://cdn-icons-png.flaticon.com/128/189/189665.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('getContact') }}">
                                        <p class="card-text text-dark" style="font-size: 27px; padding-top:25px ;">اسئلة
                                            الادارة </p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <a href="{{ route('sitesettingsShow') }}" class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <img src="https://cdn-icons-png.flaticon.com/128/7947/7947783.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <p class="card-text text-dark" style="font-size: 23px; padding-top:25px ;">
                                        إعداد
                                        المنصة</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="{{ route('getProfile') }}">
                                            <img src="https://cdn-icons-png.flaticon.com/128/3649/3649387.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                            <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                        </a>
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('getProfile') }}">
                                        <p class="card-text text-dark" style="font-size: 23px; padding-top:25px ;"> إعداد
                                            الحساب</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if (auth()->user()->user_type == 'teacher')
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="{{ route('teacherCourse') }}">
                                            <img src="https://cdn-icons-png.flaticon.com/128/5000/5000269.png" width="60px" style="padding-top:15px;padding-bottom:25px">
                                        </a>
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('teacherCourse') }}">
                                        <p class="card-text fw-bold text-dark" style="font-size: 18px; padding-top:25px ;">الكورسات المسجلة
                                    </a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="#">
                                            <img src="https://cdn-icons-png.flaticon.com/128/12740/12740855.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                        </a>
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{route('getPaymentHistoryTeacher')}}">
                                        <p class="card-text text-dark" style="font-size: 20px; padding-top:25px ;">الدفعات المحصلة </p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->

                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <img src="https://cdn-icons-png.flaticon.com/128/3476/3476376.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{route('getCourseSubscription')}}">
                                        <p class="card-text fw-bold text-dark" style="font-size: 18px; padding-top:25px ;">اشتركات الطلبة</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="#">
                                            <img src="https://cdn-icons-png.flaticon.com/128/3678/3678289.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                        </a>
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{route('getBookEarnTeacher')}}">
                                        <p class="card-text  fw-bold text-dark" style="font-size: 18px; padding-top:25px ;">
                                            ارباح المذكرات</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span>
                                        <a href="{{ route('getProfile') }}">
                                            <img src="https://cdn-icons-png.flaticon.com/128/3135/3135715.png" width="65px" style="padding-top:15px;padding-bottom:25px">
                                        </a>
                                        <!-- <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i> -->
                                    </span>
                                </div>
                                <div class="float-right text-center">
                                    <a href="{{ route('getProfile') }}">
                                        <p class="card-text fw-bold text-dark" style="font-size: 18px; padding-top:25px ;">
                                            ملفك الشخصي</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- widgets -->
            @endif

            @if (auth()->user()->user_type == 'user')
            @if ($countCart >= 1)

            <div class="d-flex text-center text-dark w-100">
                <div class="mx-auto d-flex px-4"><a href="{{ route('studentcart') }}">
                        <div class="img-cart ">
                            <img width="60" src="/assets/ass/img/shopping-cart_1170576.svg" alt=""> <strong class="h4">اذهب الي السلة</strong>
                        </div>
                        <div class="text-center ">
                            <h3 class="fw-bold mb-4"><span class="text-danger">الاجمالي : </span> {{$sumPrice}} د.ك</h4>
                        </div>
                    </a></div>
            </div>
            @endif
            <!--  -->
            @if($userPackage->count() > 0)
            <div class="d-flex justify-content-center flex-wrap align-items-center">
                @foreach($userPackage as $package)
                @php
                $isUserSub = false;
                foreach ($paks as $pak) {
                if ($pak->id == $package->id) {
                $isUserSub = true;
                break;
                }
                }

                $isPackageInCart = false;
                foreach ($cart as $cartItem) {
                if ($cartItem->package_id == $package->id) {
                $isPackageInCart = true;
                break;
                }
                }
                @endphp

                <div class="col-lg-7 col-sm-12 mx-auto">
                    <div class="card mb-3 w-100 bg-light text-dark">
                        <div class="contant-card px-4 d-flex align-items-center">
                            <div class="contant-1 ps-4">
                                <h5 class="fw-bold pt-2"> {{ $package->name }} @if($isUserSub)<span class="text-danger">(الذهبية)</span>@endif</h5>
                                <span class="text-dark d-block">(تشمل {{ $package->course->count() }} مواد)</span>
                                @foreach($package->course as $course)
                                <span class="text-dark">{{ $course->subject_name }}</span>
                                @if (!$loop->last)
                                <span> - </span>
                                @endif
                                @endforeach
                            </div>
                            <div class="img-card1 text-center ms-auto pe-4 py-4 w-100">
                                <img src="/assets/ass/img/img-card2.png" width="150" alt="">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mx-auto gap-5">
                            @if($isUserSub)
                            <h6 class="fw-bold bg-success text-light rounded p-2"> اشتراك مفعل <i class="fa fa-check" aria-hidden="true"></i></h6>
                            @elseif($isPackageInCart)
                            <h6 class="fw-bold bg-success text-light rounded p-2"> الباقة في سلة المشتريات <i class="fa fa-shopping-cart" aria-hidden="true"></i></h6>
                            @else
                            <h6 class="fw-bold "> سعر الباقة <span class="text-danger">({{ $package->price }} د.ك)</span><del class="ms-2 d-block text-center">{{ $package->price*2 }} د.ك</del></h6>
                            <form action="{{ route('studentCartCreatePackage', [$package->id ,$package->price]) }}" class="m-5" method="post">
                                @csrf
                                <button class="btn btn-danger  " type="submit">
                                    <span class="fw-bold text-white h5 ">الاشتراك <i class="fa fa-shopping-cart ml-2" aria-hidden="true"></i> </span>
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif


            <!--  -->
            <!-- @if($userPackage->count() > 0)
            <h2 class="text-center mx-auto text-light py-3 rounded bg-danger w-50">الباقات</h2>
            <div class="d-flex justify-content-center flex-wrap align-items-center">
                @foreach($userPackage as $package)

                @php
                $isUserSub = false;
                foreach ($paks as $pak) {
                if ($pak->id == $package->id) {
                $isUserSub = true;
                break;
                }
                }

                $isPackageInCart = false;
                foreach ($cart as $cartItem) {
                if ($cartItem->package_id == $package->id) {
                $isPackageInCart = true;
                break;
                }
                }
                @endphp
                @if ($isUserSub == true)

                @elseif($isPackageInCart == true)
                <div class="bg-dark p-4 m-3 rounded">
                    <h4 class="text-center text-light pt-3">
                        اسم الباقة : {{ $package->name }}
                    </h4>
                    <div class="d-flex text-light">
                        <h5 class="fs-2 fw-bold text-light"> المواد : (</h5>
                        @foreach($package->course as $index => $pack)
                        <h5 class="text-light"> {{ $pack->subject_name }} </h5>

                        @if (!$loop->last)
                        <h5 class="text-light"> - </h5>
                        @endif
                        @if ($loop->last)
                        <h5 class="text-light"> ) </h5>
                        @endif
                        @endforeach


                    </div>
                    <h6 class="text-center text-light">
                        عدد لمواد : {{ $package->course->count() }}
                    </h6>
                    <h4 class="py-3 bg-light px-2 rounded"> الباقة فى سلة المشتريات </h4>
                </div>
                @else
                <div class="bg-dark p-4 m-3 rounded">
                    <h4 class="text-center text-light pt-3">
                        اسم الباقة : {{ $package->name }}
                    </h4>
                    <div class="d-flex">
                        <h5 class="fs-2 fw-bold text-light"> المواد : (</h5>
                        @foreach($package->course as $index => $pack)
                        <h5 class="text-light"> {{ $pack->subject_name }} </h5>
                        @if (!$loop->last)
                        <h5 class="text-light"> - </h5>
                        @endif
                        @if ($loop->last)
                        <h5 class="text-light"> ) </h5>
                        @endif
                        @endforeach
                    </div>
                    <h6 class="text-center text-light">
                        عدد لمواد : {{ $package->course->count() }}
                    </h6>
                    <div>
                        <form action="{{ route('studentCartCreatePackage', [$package->id ,$package->price]) }}" method="post">
                            @csrf
                            <button class="btn btn-light py-3" type="submit">
                                <h4 class="fw-bold"> سعر الاشتراك
                                    {{ $package->price }} د.ك
                                </h4>
                            </button>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endif -->
            <h4 class="text-center text-dark mt-3 fw-bold">المواد</h4>
            <div class="d-flex justify-content-center flex-wrap">
                <!-- @foreach ($userSubject as $subject)
                <div class="bg-dark p-3 m-3 rounded">
                    <a href="{{ route('showTutorial', $subject->id) }}">
                        <h4 class="text-center text-light">
                            {{ $subject->subject_name }}
                        </h4>
                        <h6 class="text-center text-light">
                            {{ $subject->techer->name }}
                        </h6>
                        <div class="bg-light p-3 rounded">
                            @php
                            $isUserSub = false;
                            foreach ($subs as $sub) {
                            if ($sub->id == $subject->id) {
                            $isUserSub = true;
                            break;
                            }
                            }

                            $isCourseInCart = false;
                            foreach ($cart as $cartItem) {
                            if ($cartItem->course_id == $subject->id) {
                            $isCourseInCart = true;
                            break;
                            }
                            }
                            @endphp
                            @if ($isUserSub == true)
                            <h4 class="bg-success rounded p-3 text-light">انت مشترك في هذا الكورس</h4>
                            @elseif($isCourseInCart == true)
                            <h4> الكورس فى سلة المشتريات </h4>
                            @else
                            <form action="{{ route('studentCartCreate', [$subject->id, $subject->monthly_subscription_price]) }}" method="post">
                                @csrf
                                <button class="buttonhover" type="submit">
                                    <h6 style="font-weight: bolder; font-size: 18px"> اشتراك شهري
                                        {{ $subject->monthly_subscription_price }} د.ك
                                    </h6>
                                </button>
                            </form>
                            <form action="{{ route('studentCartCreate', [$subject->id, $subject->term_price]) }}" method="post">
                                @csrf
                                <button class="buttonhover" type="submit">
                                    <h6 style="font-weight: bolder; font-size: 18px"> اشتراك ترم كامل
                                        {{ $subject->term_price }} د.ك
                                    </h6>
                                </button>
                            </form>
                            @endif
                        </div>
                    </a>
                </div>
                @endforeach -->ِ
                <div class="row">
    @foreach ($userSubject as $subject)
    <div class="col-md-4 mb-4">
        <div class="card bg-light text-dark text-center">
            <a href="{{ route('showTutorial', $subject->id) }}" class="contant-2 mt-3 ms-3  gap-5 justify-content-center align-items-center text-dark">
                <div class="img-video">
                    <h5 class="fw-bold text-dark">{{ $subject->subject_name }}</h5>
                    <h6>{{ $subject->techer->name }}</h6>
                    <img src="/assets/ass/img/books1.png" width="150" alt="">

                    <div class="bg-light p-3 rounded">

                        @php
                        $isUserSub = false;
                        foreach ($subs as $sub) {
                        if ($sub->id == $subject->id) {
                        $isUserSub = true;
                        break;
                        }
                        }

                        $isCourseInCart = false;
                        foreach ($cart as $cartItem) {
                        if ($cartItem->course_id == $subject->id) {
                        $isCourseInCart = true;
                        break;
                        }
                        }
                        @endphp
                        @if ($isUserSub == true)
                        <h6 class="bg-success rounded p-1 text-light">المادة مفعلة </h6>
                        @elseif($isCourseInCart == true)
                        <h6 class="bg-warning rounded p-1 text-dark"> المادة فى السلة  </h6>
                       
                        @else
                        <div class="sub d-flex justify-content-around">
                        <form action="{{ route('studentCartCreate', [$subject->id, $subject->monthly_subscription_price]) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit">
                                <span class="text-light fw-bold h6">  شهر
                                    {{ $subject->monthly_subscription_price }} د.ك
                                </span>
                            </button>
                        </form>
                        <form action="{{ route('studentCartCreate', [$subject->id, $subject->term_price]) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit">
                                <span class="text-light fw-bold h6">  ترم 
                                    {{ $subject->term_price }} د.ك
                                </span>
                            </button>
                        </form>
                        </div>
                        @endif
                    </div>
                </div>
            </a>
            
        </div>
    </div>
    @endforeach
</div>


            </div>


            @endif
            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>