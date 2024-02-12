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
    <link href="assets/css/styles_one.css" rel="stylesheet">
    <title> الصفحة الرئيسية </title>
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

<body>
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
        <div class="hero">
            <h1>يمكنك <span class="auto-type"></span></h1>
            <div class="ctas">
                <a class="cta purple" style="margin:25px; text-decoration: none;" href="{{route('stagesPage')}}">استكشف المواد</a>
                <button class="cta purple" style="margin:25px;">استكشف المذكرات</button>
            </div>

        </div>
        <!-- الميزات -->
        <div class="container">

        <div class="box" style="--clr:#5b98eb">
                <div class="content">
                    <div class="icon"> <img src="https://cdn-icons-png.flaticon.com/128/2103/2103458.png"
                            class="  highlight-icon logo " width="80px"></div>
                    <div class="text">
                        <h3> الكورسات المسجلة </h3>
                    </div>
                </div>
            </div>
            <div class="box" style="--clr:#fb3545 ">
                <div class="content">
                    <div class="icon"> <img src="https://cdn-icons-png.flaticon.com/128/2097/2097068.png"
                            class="  highlight-icon logo " width="80px"></div>
                    <div class="text">
                        <h3> المذكرات المطبوعة </h3>
                    </div>
                </div>
            </div>

          
        <div class="box" style="--clr:#B0E0E6">
                <div class="content">
                    <div class="icon"> <img src="https://cdn-icons-png.flaticon.com/128/779/779868.png"
                            class="  highlight-icon logo " width="80px"></div>
                    <div class="text">
                        <h3> كورسات حضوري </h3>
                    </div>
                </div>
            </div>
            <div class="box" style="--clr:#33ec5b">
                <div class="content">
                    <div class="icon"> <img src="https://cdn-icons-png.flaticon.com/128/4762/4762311.png"
                            class="  highlight-icon logo " width="80px">
                    </div>
                    <div class="text">
                        <h3>كورسات اونلاين </h3>
                    </div>
                </div>
            </div>
     
            <div class="box" style="--clr:#eb5ae5">
                <div class="content">
                    <div class="icon"> <img src="https://cdn-icons-png.flaticon.com/128/3750/3750032.png"
                            class="  highlight-icon logo " width="80px"></div>
                    <div class="text">
                        <h3> مدرس خصوصي</h3>
                    </div>
                </div>
            </div>
         

            <div class="box" style="--clr:#F8F8FF">
                <div class="content">
                    <div class="icon"> <img src="https://cdn-icons-png.flaticon.com/128/7851/7851689.png"
                            class="  highlight-icon logo " width="80px"></div>
                    <div class="text">
                        <h3>اختبارات وبنوك </h3>
                    </div>
                </div>
            </div>
            </div>

        <div class="features">
            <h3>نبذه عن المنصة </h3>
            <h6>معنا فالك التفوق</h6>
            <div class="features-list">
                <div class="feature">
                    <div class="content">
                        <img src=" https://cdn-icons-png.flaticon.com/128/10155/10155988.png"
                            class="  highlight-icon logo " width="100px">
                        <h2
                            style="text-align: center; padding:10px; background-color: #0893c5; width:40%; margin:10px auto; margin-bottom: 25px; ">
                            منصتنا </h2>
                        <p>
                            {{ $data->content1 }}
                        </p>
                        <p>
                            {{ $data->content2 }}
                        </p>
                        <p>
                            {{ $data->content3 }}
                        </p>
                        <p>
                            {{ $data->content4 }}
                        </p>

                    </div>
                    <img src="assets/education/purple-website.jpg " alt="purple website" class="img-descriprion" />
                </div>
            </div>
        </div>
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
    <script src="assets/js/script_one.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
        var typed = new Typed(".auto-type", {

            strings: [" الانضمام لنخبة من أقوي معلمي دولة الكويت   ", "  الحصول علي اختبارات سابقة وبنوك حديثة "],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true
        })
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
