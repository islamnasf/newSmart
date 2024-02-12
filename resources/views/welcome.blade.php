@section('title')
منصة تعلمية شاملة | SMART STUDEN
@endsection
@section('active')
active
@endsection
@include('landingpage.layouts.head')
<section id="hero">
    <div class="container h-100">
        <div class="contant  d-flex  justify-content-center align-items-center">
            <div class="text">
                <h2 class="fs-1 fw-bold">منصة تعليمية شاملة</h2>
                <p class="fs-5">منصة تعليمية متكاملة بمدرسين محترفين ومحتوى متميز يغطي جميع المراحل الدراسية. تقدم مذكرات وكورسات على الإنترنت، مما يوفر تجربة تعلم شاملة وممتعة للطلاب.</p>
                <a href="{{route('getLandingSubjectsStage')}}"><button class="btn-20"><span>استكشف المواد</span></button></a>
            </div>
            <div class="icon-hero">
                <img src="assets/ass/img/img-hero.png" width="620" alt="">
            </div>
        </div>
    </div>
</section>
<section id="services">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-12 mb-4 justify-content-center text-center align-items-center">
                <div class="card bg-dark">
                    <img src="assets/ass/img/online-course.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{route('getLandingSubjectsStage')}}">
                            <h5 class="card-title btn-20 text-center"><span>الكورسات المسجلة</span></h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card bg-dark">
                    <img src="assets/ass/img/notepad.jpg" class="card-img-top " alt="...">
                    <div class="card-body">
                        <a href="{{route('getNotesStage')}}">
                            <h5 class="card-title btn-20 text-center"><span>المذكرات المطبوعة</span></h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card bg-dark">
                    <img src="assets/ass/img/presentation.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title btn-20 text-center"><span>كورسات حضوري</span></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card bg-dark">
                    <img src="assets/ass/img/tutorial.jpg" width="150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title btn-20 text-center"><span>كورسات أونلاين</span></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card bg-dark">
                    <img src="assets/ass/img/professor.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title btn-20 text-center"><span>معلمك الخاص </span></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card bg-dark">
                    <img src="assets/ass/img/data.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title btn-20 text-center"><span>اختبارات وبنوك</span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="packages">
    <div class="container py-5">
        <h4 class="text-center fw-bold fs-3 title">أفضل الباقات</h4>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card text-center">
                    <img src="assets/ass/img/img-card1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold ">الباقة الفضية</h5>
                        <a href="#" class="btn fw-bold btn-dark text-light">شاهد المزيد</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card text-center">
                    <img src="assets/ass/img/img-card2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">الباقة الذهبية</h5>
                        <a href="#" class="btn fw-bold btn-dark text-light">شاهد المزيد</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card text-center">
                    <img src="assets/ass/img/img-card3.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">الباقة الماسية</h5>
                        <a href="#" class="btn fw-bold btn-dark text-light">شاهد المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section id="courses">
        <div class="container  py-5">
            <h4 class="text-center title fw-bold">أفضل المواد</h4>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="assets/ass/img/img-card.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="assets/ass/img/img-card.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <img src="assets/ass/img/img-card.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section> -->
@if($teacherData->count() != 0 )
<section id="Teachers">
    <div class="container  py-5">
        <h4 class="text-center title fw-bold">المدرسين</h4>
        <div class="owl-carousel owl-theme">
            @foreach($teacherData as $item)
            <div class="item d-flex justify-content-center align-items-center gap-4 ">
                <img class="img-teach" src="assets/ass/img/icon-teach.png" alt="">
                <div class="teach-text">
                    <h4> {{$item->name}}</h4>
                    <ul class="d-flex g">
                        <li>
                            <img class="img-star" src="assets/ass/img/star.png" alt="">
                        </li>
                        <li>
                            <img class="img-star" src="assets/ass/img/star.png" alt="">
                        </li>
                        <li>
                            <img class="img-star" src="assets/ass/img/star.png" alt="">
                        </li>
                        <li>
                            <img class="img-star" src="assets/ass/img/star.png" alt="">
                        </li>
                        <li>
                            <img class="img-star" src="assets/ass/img/star.png" alt="">
                        </li>
                    </ul>
                    <p> {{{$item->teacher_description}}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- <sectioin id="studen" class="bg-dark">
    <div class="container  py-5">
        <h4 class="text-center title fw-bold">اراء الطلاب</h4>
        <div class="owl-carousel owl-theme">
            <div class="item d-flex justify-content-center align-items-center gap-4 ">
                <img class="img-teach" src="assets/ass/img/img-stu.png" alt="">
                <div class="teach-text">
                    <h4>طالب / اسلام ناصف</h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis aperiam eius</p>
                </div>
            </div>
            <div class="item d-flex justify-content-center align-items-center gap-4">
                <img class="img-teach" src="assets/ass/img/img-gril.png" alt="">
                <div class="teach-text">
                    <h4>طالب / اسلام ناصف</h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis aperiam eius</p>
                </div>
            </div>
            <div class="item d-flex justify-content-center align-items-center gap-4">
                <img class="img-teach" src="assets/ass/img/img-stu.png" alt="">
                <div class="teach-text">
                    <h4>طالب / اسلام ناصف</h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis aperiam eius</p>
                </div>
            </div>
            <div class="item d-flex justify-content-center align-items-center gap-4">
                <img class="img-teach" src="assets/ass/img/img-gril.png" alt="">
                <div class="teach-text">
                    <h4>طالب / اسلام ناصف</h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis aperiam eius</p>
                </div>
            </div>
            <div class="item d-flex justify-content-center align-items-center gap-4">
                <img class="img-teach" src="assets/ass/img/img-stu.png" alt="">
                <div class="teach-text">
                    <h4>طالب / اسلام ناصف</h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis aperiam eius</p>
                </div>
            </div>
        </div>
    </div>
    </section> -->

    @include('landingpage.layouts.footer')