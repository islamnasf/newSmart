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
            <h3 class="text-center pb-2 title">المرحلة الابتدائية</h3>
            <div class="row text-center">
                <div class="col-lg-6 col-md-6 col-sm-12 pb-5">
                    <div class="box">
                        <a href="{{route('getNotesClass','four')}}" class="text-light">
                            <img src="/assets/ass/img/four.png" class="mb-3" width="150" alt="">
                            <h5 class="one">الصف الرابع </h5>
                        </a>
                    </div>
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 pb-5">
                    <a href="{{route('getNotesClass','five')}}" class="text-light">
                        <img src="/assets/ass/img/five.png" class="mb-3" width="150" alt="">
                        <h5 class="two">الصف الخامس</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @include('landingpage.layouts.footer')
