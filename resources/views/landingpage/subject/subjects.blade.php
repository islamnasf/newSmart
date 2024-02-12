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
    <link href="{{ url('assets/css/styles_one.css') }}" rel="stylesheet">
    <title>جميع المواد </title>
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
        .wrapper {
            font-family: 'poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 50px;
        }
        
        .content-box {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1100px;
            margin-top: 30px;
        }
        .card {
            height: 80px;
            width: 240px;
            padding: 30px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: #0A5384;
            margin: 10px 10px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            border: #0A5384 5px solid;

        }
        .maincard{
            height: 150px;
            width: 240px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 10px 10px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            background-color: #0893c5;
            padding-bottom: 10px;
        }
      
        .card h2 {
            font-weight: 400;
            text-align: center;
            color: #ffffff;
            background: #0893c5;
            padding: 6px 20px;
            border-radius: 10px;

        }
        .card:hover {
            background: #1e2028;
            border: #1e2028 5px solid;
            transition: 1s;
        }
        .card:hover h2 {
            color: #0893c5;
            background: #1e2028;
            transition: .8s;
        }
        .herostages{
            height: 37vh;
        }
        /* // */
        .firstcard {
            font-family: 'poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .cardone {
            min-height: 240px;
            width: 540px;
            border-radius: 15px;
            display: flex;
            justify-content: space-around;
            flex-direction: row;
            background: #0A5384;
            margin: 10px 10px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            border: #0893c5 5px solid;
            color: #ffffff;
            align-items: center;
        }
        .content-boxone {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
        }
        @media screen and (max-width: 600px) {
            .herostages{
            height: 20vh;
        }
        .herostages h1{
margin-top: 120px;        }
            .card {
                min-height: 80px;
                width: 170px;
                padding: 30px;
                border-radius: 5px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                background: #0A5384;
                margin: 10px auto;
                box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            }
            .maincard{
                width: 180px;
            }
            .cardone {
            min-height: 120px;
            width: 370px;
            border-radius: 15px;
            display: flex;
            
            flex-direction: column;
            background: #0893c5;
            margin: 20px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            border: #0A5384 5px solid;
        }
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

        <div class="herostages">
            <h1
                style="color:white ; background-color:#1e2028; padding: 20px;  opacity: .7; text-align: center; width:100%; ">
                كل اللى تحتاجه للتفوق بمكان واحد</h1>

        </div>
        <div class="firstcard">
            <div class="content-boxone "> 
                <a href="#" style="text-decoration: none;"class="cardone">
                    <div style="padding-bottom: 50px;">
                        <h1 style="padding: 10px;">شروحات +مذكرات</h1>
                        <p style="font-size: 22px; padding-right: 15px; font-weight: 600; color: var(--gray)">  6 مواد شرح  +4 مذكرات</p>
                        <p style="font-size: 22px; padding-right: 15px; font-weight: 600; color: var(--gray)"> سعر الباقة 40د.ك</p>
                    </div>
                 <img src="https://cdn-icons-png.flaticon.com/128/11722/11722452.png"  width="110px" height="110px"/>
                </a>

                <a href="#" style="text-decoration: none;"class="cardone">
                    <div style="padding-bottom: 50px;">
                        <h1 style="padding: 10px;">باقات شروحات ترم كامل </h1>
                        <p style="font-size: 22px; padding-right: 15px; font-weight: 600; color: var(--gray)">    4 مواد شرح     </p>
                        <p style="font-size: 22px; padding-right: 15px; font-weight: 600; color: var(--gray)"> سعر الباقة 30د.ك</p>
                    </div>
                 <img src="https://cdn-icons-png.flaticon.com/128/11722/11722452.png"  width="110px" height="110px"/>
                </a>
            
    </div>

        </div>
        @if (Route::current()->Parameter('name') == 'six')
        <div class="featuresstage">

            <h3>مواد الصف السادس   </h3>
            <h6>  جميع مواد الصف السادس  </h6>
            <div class="features-list">

            </div>
        </div>
         <div class="wrapper">
            <div class="content-box">
            @foreach($coursesix as $course)
            <div class="maincard">
                <a href="{{route('subjectsShowOne', $course->id)}}" style="text-decoration: none;"class="card">
                <div>
                        <h2> {{$course->subject_name}} </h2>
                    </div>
                </a>
                <div>
               
                <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري {{$course->monthly_subscription_price}}د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم {{$course->term_price}}د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            @endforeach
            </div>
        </div>
        @elseif (Route::current()->Parameter('name') == 'seven')
        <div class="featuresstage">

            <h3>مواد الصف السابع   </h3>
            <h6>  جميع مواد الصف السابع  </h6>
            <div class="features-list">

            </div>
        </div>
         <div class="wrapper">
            <div class="content-box">
            @foreach($courseseven as $course)
            <div class="maincard">
                <a href="{{route('subjectsShowOne', $course->id)}}" style="text-decoration: none;"class="card">
                <div>
                        <h2> {{$course->subject_name}} </h2>
                    </div>
                </a>
                <div>
               
                <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري {{$course->monthly_subscription_price}}د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم {{$course->term_price}}د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            @endforeach
            </div>
        </div>
        @elseif (Route::current()->Parameter('name') == 'eight')
        <div class="featuresstage">

            <h3>مواد الصف الثامن   </h3>
            <h6>  جميع مواد الصف الثامن  </h6>
            <div class="features-list">

            </div>
        </div>
         <div class="wrapper">
            <div class="content-box">   
            @foreach($courseeight as $course)
            <div class="maincard">
                <a href="{{route('subjectsShowOne', $course->id)}}" style="text-decoration: none;"class="card">
                <div>
                        <h2> {{$course->subject_name}} </h2>
                    </div>
                </a>
                <div>
               
                <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري {{$course->monthly_subscription_price}}د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم {{$course->term_price}}د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            @endforeach
            </div>
        </div>
        @elseif (Route::current()->Parameter('name') == 'nine')
        <div class="featuresstage">

            <h3>مواد الصف التاسع   </h3>
            <h6>  جميع مواد الصف التاسع  </h6>
            <div class="features-list">

            </div>
        </div>
         <div class="wrapper">
            <div class="content-box">   
            @foreach($coursenine as $course)
            <div class="maincard">
                <a href="{{route('subjectsShowOne', $course->id)}}" style="text-decoration: none;"class="card">
                <div>
                        <h2> {{$course->subject_name}} </h2>
                    </div>
                </a>
                <div>
               
                <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري {{$course->monthly_subscription_price}}د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم {{$course->term_price}}د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            @endforeach
            </div>
        </div>
        @elseif (Route::current()->Parameter('name') == 'ten')
        <div class="featuresstage">

            <h3>مواد الصف العاشر   </h3>
            <h6>  جميع مواد الصف العاشر  </h6>
            <div class="features-list">

            </div>
        </div>
         <div class="wrapper">
            <div class="content-box">   
            @foreach($courseten as $course)
            <div class="maincard">
                <a href="{{route('subjectsShowOne', $course->id)}}" style="text-decoration: none;"class="card">
                <div>
                        <h2> {{$course->subject_name}} </h2>
                    </div>
                </a>
                <div>
               
                <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري {{$course->monthly_subscription_price}}د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم {{$course->term_price}}د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            @endforeach
            </div>
        </div>
        @elseif (Route::current()->Parameter('name') == 'eleven')
        <div class="featuresstage">

            <h3>مواد الصف الحادي عشر   </h3>
            <h6>  جميع مواد الصف الحادي عشر  </h6>
            <div class="features-list">

            </div>
        </div>
         <div class="wrapper">
            <div class="content-box">   
            @foreach($courseeleven as $course)
            <div class="maincard">
                <a href="{{route('subjectsShowOne', $course->id)}}" style="text-decoration: none;"class="card">
                <div>
                        <h2> {{$course->subject_name}} </h2>
                    </div>
                </a>
                <div>
               
                <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري {{$course->monthly_subscription_price}}د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="{{ route('login') }}" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم {{$course->term_price}}د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            @endforeach
            </div>
        </div>
        @elseif (Route::current()->Parameter('name') == 'twelve')
        <div class="featuresstage">

            <h3>مواد الصف الثاني عشر   </h3>
            <h6>  جميع مواد الصف الثاني عشر  </h6>
            <div class="features-list">

            </div>
        </div>
         <div class="wrapper">
            <div class="content-box">   
            @foreach($coursetwelve as $course)
            <div class="maincard">
                <a href="{{route('subjectsShowOne', $course->id)}}" style="text-decoration: none;"class="card">
                <div>
                        <h2> {{$course->subject_name}} </h2>
                    </div>
                </a>
                <div>
               
                <a href="{{ route('login') }}"  style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري {{$course->monthly_subscription_price}}د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="{{ route('login') }}"  style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم {{$course->term_price}}د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            @endforeach
            </div>
        </div>
        @else
        <div class="featuresstage">

            <h3>مواد الصف السادس   </h3>
            <h6>  جميع مواد الصف السادس  </h6>
            <div class="features-list">

            </div>
        </div>
        <div class="wrapper">
            <div class="content-box">
            @foreach($course as $course)

            <div class="maincard">
                <a href="#" style="text-decoration: none;"class="card">
                    <div>
                        <h2> العلوم </h2>
                    </div>
                </a>
                <div>      
                <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري 15د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px" >    
                <br>           
                    <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم 15د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            <div class="maincard">
                <a href="#" style="text-decoration: none;"class="card">

                <div>
                        <h2> الاجتماعيات </h2>
                    </div>
                </a>
                <div>
               
                <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري 15د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                <br>
                    
                    <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم 15د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    

                </div>
            </div>
            <div class="maincard">
                <a href="#" style="text-decoration: none;"class="card">
                    <div>
                        <h2> الرياضيات </h2>
                    </div>
                </a>
                <div>
                <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري 15د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    
                <br>
                    
                    
                <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" > اشتراك ترم 15د.ك </a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    
    
            </div>
            </div>
            <div class="maincard">
                <a href="#" style="text-decoration: none;"class="card">
                    <div>
                        <h2> اللغة لعربية </h2>
                    </div>
                </a>
                <div>
                <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder;" >اشتراك شهري 15د.ك</a>
                <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    
    
                <br>
                    
                    <a href="#" style="color: #ffffff ; text-decoration: none; font-weight: bolder; margin-top: 10px;" >اشتراك ترم 15د.ك</a>
                    <img src="https://cdn-icons-png.flaticon.com/128/4379/4379578.png" width="18px">    
                </div>
            </div>
            </div>
        </div>
        @endforeach
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
