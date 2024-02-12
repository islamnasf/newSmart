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
    <title> وحدات المادة</title>
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
            max-width: 1000px;
            margin-top: 30px;
        }
        .card {
            min-height: 220px;
            width: 230px;
            padding: 30px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: #1e2028;
            margin: 10px 10px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            border: #1e2028 5px solid;

        }
        .card i {
            margin: 20px;
            color: #ffffff;
        }
        .card h2 {
            margin-top: 30px;
            font-weight: 400;
            text-align: center;
            color: #ffffff;
            background: #0893c5;
            padding: 6px 20px;
            border-radius: 10px;

        }
        .card:hover {
            background: #0893c5;
            opacity: .85;
            border: #1e2028 5px solid;
            transition: 1s;
        }
        .card:hover h2 {
            color: #0893c5;
            background: #1e2028;
            transition: .8s;
        }
        .one{
            margin-top: 100px;
        }
/* 000 */
.tutorial {
      font-family: Arial, sans-serif;
      margin: 0 ;
      display: flex;
      justify-content: center;
      align-items: center;
     max-height: 100vh;
     margin-bottom: 50px;
    }
    .accordion {
      width: 1000px;
      padding: 20px;
      background-color: #1e2028;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .item {
      cursor: pointer;
      padding: 13px;
      background-color: #2980b9;
      color: #fff;
      border-radius: 4px;
      margin-bottom: 5px;
      transition: background-color 0.3s;
      font-size: 20px;
      font-weight: 800;
    }
    .item:hover {
      background-color: #0893c5;
    }
    .content {
      display: none;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 2px;
      background-color: #ddd;
    }
    .insidecontent{
        border-bottom: 3px solid #2980b9;
        padding: 8px;
        margin: 4px;
        font-size: 16px;
        border-radius: 5px;
      font-weight: 800;
      transition: .3s;
    }
    .insidecontent:hover{
       background-color: #1e2028;
       color: #ddd;
       border-bottom: 3px solid #1e2028;
       transition: .3s;
    }
    .content.active {
      display: block;
    }
       @media screen and (max-width: 600px) {
            .card {
                min-height: 220px;
                width: 150px;
                padding: 30px;
                border-radius: 5px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                background: #1e2028;
                margin: 10px auto;
                box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            }
            .tutorial {
                margin-top: 60px;

     margin-bottom: 220px;
    }
        }
    </style>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
        <div class="featuresstage">
            <div class="one">
            <h3>اسم المادة :{{$courses->subject_name}} </h3>
            <h6  style="text-align:center">جميع وحدات المادة  </h6>
    </div>
        </div>
<!-- 0000 -->
<div class="tutorial">
<div class="accordion">
    @foreach($tutorials as $tutorial)
    <!-- <div class="item" onclick="toggleContent('content1')"> الوحدة التعليمية الاولي : التكاثر ف الانسان</div> -->
 <div class="item" onclick="toggleContent('{{ $tutorial['id'] }}')"> {{$tutorial->name}}</div> 
    <div class="content" id="{{ $tutorial['id'] }}">
    @foreach ($tutorial->video as $video)
        @if($video -> type == 'free' )
    <div  class="insidecontent" ><a href="{{ route('freeVideo',$video->id) }}" width="100%"  style="text-decoration: none; color:#2980b9"><img src="https://cdn-icons-png.flaticon.com/128/2377/2377746.png" style="margin-top:5px ;" width="20px">  {{$video->name}} ( تجربة مجانية  )</a></div>
        @else
    <div  class="insidecontent"><img src="https://cdn-icons-png.flaticon.com/128/10464/10464776.png" style="margin-top:5px ;" width="20px">   {{$video->name}}</div>
        @endif
    @endforeach
    </div>
    @endforeach

  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    function toggleContent(contentId) {
      $("#" + contentId).toggleClass("active").siblings(".content").removeClass("active");
    }
  </script>
<!-- 000 -->
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