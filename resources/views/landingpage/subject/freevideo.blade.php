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
    <title> تجربة مجانية  </title>
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
        .videostyle{
        width: 900px;
            height: 550px;
        }
        @media screen and (max-width: 900px) {
         
         .videostyle{
             width: 650px;
             height: 350px;
         }
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
        .videostyle{
            width: 350px;
            height: 220px;
        }
        }
        .textarea {
            width: 80%;
    max-width: 900px;
    background-color: #1e2028;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 25px;
}
form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 16px;
    margin-bottom: 8px;
}

textarea {
    height: 150px;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #0A5384;
    border-radius: 5px;
    margin-bottom: 12px;
    resize: none;
    background-color: #ddd;
}

button {
    background-color: #0A5384;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    max-width: 25%;
    margin: 0px auto;
}

button:hover {
    background-color: #0893c5;
}
@media screen and (max-width: 480px) {
    .container {
        width: 90%;
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

        <div class="featuresstage" >

            <h3 style="margin-top:50px;">   {{$video->name}}  </h3>
            <h6 style="color: #0893c5; font-size:40px; margin-top: -40px;">________</h6>

            <div class="features-list">
            <iframe src="{!! $video->link !!}" class="videostyle" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            </div>
            @if($video->pdf !=null)
            <a href="{{ route('fileDownload', $video->pdf) }}" style="text-decoration: none;"><div><span style=" font-size: 25px; color:#fff; font-weight: bold; background-color: #0A5384; padding: 12px; border-radius: 15px; border-bottom: #0893c5 5px solid ;">   مذكرة الدرس   <img src="https://cdn-icons-png.flaticon.com/128/892/892634.png" width="25px" style="margin-bottom: -8px;"></span></div></a>
            @endif
            <div class="textarea">
                <div style="text-align: center; font-size: 30px; color:#ddd; margin-bottom: 20px;">أسئلة وأجوبة</div>
            <form action="#" method="post">
            <label for="message" style="color:#ddd">إكتب سؤالك:</label>
            <textarea id="message" name="message" placeholder="يمكنك اضافة سؤالك هنا ..."></textarea>
            <button type="submit">ارسال</button>
        </form>
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
