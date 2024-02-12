<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/10155/10155988.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ url('assets/custom.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/styles_one.css') }}" rel="stylesheet">
    @if (Route::current()->Parameter('name') == 'middle')
        <title>المرحلة المتوسطة</title>
    @else
        <title>المرحلة الثانوية</title>
    @endif
    <title>Stage Informatin</title>
    <style>
        #pre-loader {
            background-color: #ffffff;
            height: 100%;
            width: 100%;
            position: fixed;
            z-index: 1;
            margin-top: 0px;
            top: 0px;
            left: 0px;
            bottom: 0px;
            overflow: hidden !important;
            right: 0px;
            z-index: 999999;
        }

        #pre-loader img {
            text-align: center;
            left: 0;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            z-index: 99;
            margin: 0 auto;
        }
    </style>

</head>

<body class="bodystage">
    <div id="pre-loader">
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>
    <main>
        <!-- التنقل -->
        <nav id="navbar">
            <img src=" https://cdn-icons-png.flaticon.com/128/10155/10155988.png" class="  highlight-icon logo "
                width="60px">
            <!-- <iclass=" fa fa-graduation-cap highlight-icon logo" ><span>Education</span></i>  -->
            <ul class="nav-items">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                <a href="{{route('stagesPage')}}" class="nav-link">استكشف المواد </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">المذكرات </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">بنك الاسئلة </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contactus') }}" class="nav-link">تواصل معنا</a>
                </li>
            </ul>
            @if (Auth::check())
                <a class="cta dark" href="{{ route('getProfile') }}"
                    style="text-decoration: none;"></button>{{ Auth()->user()->name }}</a>
            @else
                <a class="cta dark" href="{{ route('login') }}" style="text-decoration: none;">تسجيل الدخول </a>
            @endif
            <!-- <button class="cta dark">تسجيل دخول</button> -->
            <i id="mobile-toggle" class="fa fa-solid fa-bars" style="margin-left: 25px;"></i>
        </nav>
        <!-- القسم الأساسي -->
        @if (Route::current()->Parameter('name') == 'middle')
            <div class="herostages">
                <h1
                    style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-weight: bold;color: #ffffff;
                font-size: 40px;padding-top: 200px">
                    المرحلة المتوسطة
                </h1>
            </div>
            <div class="container mt-5" style="margin-bottom: 50px">
                <div class="mainCard">
                    <!-- Loop to create 4 cards -->
                    <div class="card">
                        <div
                            style="display: flex;justify-content: space-around;align-items: center;flex-direction: column;height: 100%;">
                            <img src="https://cdn-icons-png.flaticon.com/128/3840/3840755.png" width="65px" />
                            <a href="{{ route('subjectsShow','six') }}">الصف السادس</a>
                        </div>
                    </div>
                    <div class="card">
                        <div
                            style="display: flex;justify-content: space-around;align-items: center;flex-direction: column;height: 100%;">
                            <img src="https://cdn-icons-png.flaticon.com/128/3840/3840771.png" width="65px" />
                           
                            <a href="{{ route('subjectsShow', 'seven') }}">
                                 الصف السابع 


                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div
                            style="display: flex;justify-content: space-around;align-items: center;flex-direction: column;height: 100%;">
                            <img src="https://cdn-icons-png.flaticon.com/128/3840/3840772.png" width="65px" />
                            <a href="{{ route('subjectsShow', 'eight') }}">الصف الثامن</a>
                        </div>
                    </div>
                    <div class="card">
                        <div
                            style="display: flex;justify-content: space-around;align-items: center;flex-direction: column;height: 100%;">
                            <img src="https://cdn-icons-png.flaticon.com/128/3840/3840773.png" width="65px" />
                            <a href="{{ route('subjectsShow', 'nine') }}">الصف التاسع</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="herostages">
                <h1
                    style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-weight: bold;color: #ffffff;
                font-size: 40px;padding-top: 200px">
                    المرحلة الثانوية
                </h1>
            </div>
            <div class="container mt-5" style="margin-bottom: 50px">
                <div class="mainCard">
                    <!-- Loop to create 4 cards -->
                    <div class="card">
                        <div
                            style="display: flex;justify-content: space-around;align-items: center;flex-direction: column;height: 100%;">
                            <img src="https://cdn-icons-png.flaticon.com/128/6912/6912885.png" width="65px" />
                            <a href="{{ route('subjectsShow', 'ten') }}">الصف العاشر</a>
                        </div>
                    </div>
                    <div class="card">
                        <div
                            style="display: flex;justify-content: space-around;align-items: center;flex-direction: column;height: 100%;">
                            <img src="https://cdn-icons-png.flaticon.com/128/6912/6912910.png" width="65px" />
                            <a href="{{ route('subjectsShow', 'eleven') }}">الصف الحادي عشر</a>
                        </div>
                    </div>
                    <div class="card">
                        <div
                            style="display: flex;justify-content: space-around;align-items: center;flex-direction: column;height: 100%;">
                            <img src="https://cdn-icons-png.flaticon.com/128/6912/6912921.png" width="65px" />
                            <a href="{{ route('subjectsShow', 'twelve') }}">الصف الثاني عشر</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </main>
    <footer>
        <h3>Education</h3>
        <p>تواصل معنا الآن</p>
        <div class="icons">
            <a href="{{ $data->fb }}"><i class="icon fa-brands fa-facebook"></i></a>
            <a href="{{ $data->insta }}"><i class="icon fa-brands fa-instagram"></i></a>
            <a href="{{ $data->twitter }}"><i class="icon fa-brands fa-twitter"></i></a>
        </div>
    </footer>
    <script src="{{ url('assets/js/script_one.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        window.onscroll = function() {
            scrollFunction()
        };
        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.getElementById("navbar").style.top = "0";
                document.getElementById("navbar").style.opacity = "1";
                document.getElementById("navbar").style.transition = ".5s";
            } else {
                document.getElementById("navbar").style.top = "0px";
                document.getElementById("navbar").style.opacity = ".9";
            }
        }
    </script>
    @include('layouts.footer-scripts')

</body>

</html>
