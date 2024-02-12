<!Doctype html>
<html>

<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="{{ url('assets/css/contact.css') }}" rel="stylesheet">
    <link rel="stylesheet"   href="http://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"  >
</head>

<body>

    <section class="contact">
        <div class="content">
            <h1 style="color: white; font-size: 40px;">تواصل معنا</h1>
            <h3 style="color: white;">اذا واجهت اي مشاكل يمكن التواصل مع ادارة الموقع</h3>
        </div>
        <div class="container">
            <div class="contactInfo">

                <div class="box">
                <img   src="https://cdn-icons-png.flaticon.com/128/6717/6717201.png" width="65px" height="60px" style="padding-left: 15px; padding-bottom: 5px;"/>
                    <div class="text">
                        <h2 style="color:blanchedalmond; font-size: 25px;  margin: 0px auto; margin-right: 12px;">رقم الهاتف</h2>
                        <a href="https://wa.me/96567696809"><h5 style="color: white;">+96567696809</h5></a>
                    </div>
                </div>

                <div class="box box1">
                <img   src="https://cdn-icons-png.flaticon.com/128/893/893257.png" width="65px" height="60px" style="padding-left: 15px; padding-bottom: 5px;" />
                    <div class="text">
                    <h2 style="color:blanchedalmond ; font-size: 25px; margin-right: 12px ;">الايميل </h2>
                        <h5 style="color: white;">education@gmail.com</h5>
                        <p></p>
                    </div>
                </div>
            </div>



            <div class="contactForm">
                <form action="{{ route('postContact' )}}" method="post">
                    @csrf
                    <h2>ارسل رسالتك</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required="required">
                        <span>الاسم</span>
                    </div>
                    <div class="inputBox">
                        <input type="phone" name="phone" required="required">
                        <span>رقم الهاتف</span>
                    </div>
                    <div class="inputBox">
                        <textarea required="required" name="message"></textarea>
                        <span>موضوع الرسالة...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="ارسال ">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
<script src=" https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/js/fontawesome.min.js "></script>
</html>