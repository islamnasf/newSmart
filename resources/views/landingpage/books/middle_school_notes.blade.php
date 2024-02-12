@section('title')
مذكرات | Smart Student
@endsection
@section('active2')
active
@endsection
@include('landingpage.layouts.head')

    <section id="top-hero">
        <h2 class="text-center mx-auto text-light fs-2 fw-bold">كل اللى تحتاجه للتفوق بمكان واحد</h2>
    </section>
    <section id="bottom-hero">
        <div class="container py-5">
            <h3 class="text-center pb-2 title">المرحلة المتوسطة</h3>
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                    <div class="box">
                        <a href="{{route('getNotesClass','six')}}" class="text-light">
                            <img src="/assets/ass/img/6.png" class="mb-3" width="150" alt="">
                            <h5 class="one">الصف السادس</h5>
                        </a>
                    </div>
                    
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getNotesClass','seven')}}" class="text-light">
                        <img src="/assets/ass/img/7.png" class="mb-3" width="150" alt="">
                        <h5 class="two">الصف السابع</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getNotesClass','eight')}}" class="text-light">
                        <img src="/assets/ass/img/8.png" class="mb-3" width="150" alt="">
                        <h5 class="there">الصف الثامن</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getNotesClass','nine')}}" class="text-light">
                        <img src="/assets/ass/img/9.png" class="mb-3" width="150" alt="">
                        <h5 class="four">الصف التاسع</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @include('landingpage.layouts.footer')
