@section('title')
مواد | Smart Student
@endsection
@section('active1')
active
@endsection
@include('landingpage.layouts.head')

    <section id="top-hero">
        <h2 class="text-center mx-auto text-light fs-2 fw-bold">كل اللى تحتاجه للتفوق بمكان واحد</h2>
    </section>
    <section id="bottom-hero">
        <div class="container py-5">
            <h3 class="text-center pb-2 title">المرحلة الثانوية</h3>
            <div class="row text-center">
                <div class="col-lg-4 col-md-6 col-sm-12 pb-5">
                    <div class="box">
                        <a href="{{route('getCoursesClassRoom','ten')}}" class="text-light">
                            <img src="/assets/ass/img/10.png" class="mb-3" width="250" alt="">
                            <h5 class="one">الصف العاشر</h5>
                        </a>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getCoursesClassRoom','eleven')}}" class="text-light">
                        <img src="/assets/ass/img/11.png" class="mb-3" width="250" alt="">
                        <h5 class="two">الصف الحادي عشر</h5>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getCoursesClassRoom','twelve')}}" class="text-light">
                        <img src="/assets/ass/img/12.png" class="mb-3" width="250" alt="">
                        <h5 class="there">الصف الثاني عشر</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @include('landingpage.layouts.footer')
