@section('title')
مذكرات | Smart Student
@endsection
@section('active2')
active
@endsection
@include('landingpage.layouts.head')

    <section id="top-hero">
        <h2 class="text-center mx-auto text-light fs-2 fw-bold">مذكرات سمارت طريقك نحو التفوق </h2>
        <p id="thankYouMessage" class="alert alert-success mt-3" style="display: none;">
  شكرًا لك على ثقتك، تم الطلب بنجاح!
</p>
    </section>
    
@if(isset($thankYou) && $thankYou)
  <script>
    // جعل عنصر الشكر مرئيًا
    document.getElementById('thankYouMessage').style.display = 'block';
  </script>
@endif

    <section id="bottom-hero">
        <div class="container py-5">
            <h3 class="text-center pb-2 title">برجاء إختيار المرحلة</h3>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                        <a href="{{route('getPrimarySchool')}}" class="text-light">
                            <img src="/assets/ass/img/school.png" class="mb-3" width="150" alt="">
                            <h5 class="one">الابتدائية</h5>
                        </a>
                </div>
                <script>
                    function showAlert() {
                        alert("لايوجد كورسات لهذه المرحلة!");
                    }
                </script>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getMiddleSchool')}}" class="text-light">
                        <img src="/assets/ass/img/school.png" class="mb-3" width="150" alt="">
                        <h5 class="two">المتوسطة</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getHighSchool')}}" class="text-light">
                        <img src="/assets/ass/img/school.png" class="mb-3" width="150" alt="">
                        <h5 class="there">الثانوية</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                    <a href="#" class="text-light">
                        <img src="/assets/ass/img/school.png" class="mb-3" width="150" alt="">
                        <h5 class="four">القدرات</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @include('landingpage.layouts.footer')
